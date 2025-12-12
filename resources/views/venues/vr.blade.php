<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VR тур - {{ $venue->name }}</title>
    
    <!-- A-Frame -->
    <script src="https://aframe.io/releases/1.4.2/aframe.min.js"></script>
    <!-- A-Frame Extras для дополнительных компонентов -->
    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v7.0.0/dist/aframe-extras.min.js"></script>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        #vr-container {
            width: 100vw;
            height: 100vh;
        }
        
        .ui-overlay {
            position: fixed;
            z-index: 999;
            pointer-events: none;
        }
        
        .ui-overlay > * {
            pointer-events: auto;
        }
        
        .thumbnail-list {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 10px;
            scrollbar-width: thin;
        }
        
        .thumbnail {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            border: 3px solid transparent;
            cursor: pointer;
            flex-shrink: 0;
            object-fit: cover;
            transition: all 0.3s ease;
        }
        
        .thumbnail:hover {
            border-color: #D4AF37;
            transform: scale(1.1);
        }
        
        .thumbnail.active {
            border-color: #D4AF37;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.5);
        }
        
        .info-panel {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            color: white;
            max-width: 350px;
        }
        
        .controls {
            display: flex;
            gap: 10px;
        }
        
        .control-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .control-btn:hover {
            background: #D4AF37;
            transform: scale(1.1);
        }
        
        .help-text {
            position: fixed;
            bottom: 20%;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 16px;
            animation: fadeOut 5s forwards;
            z-index: 1000;
        }
        
        @keyframes fadeOut {
            0%, 70% { opacity: 1; }
            100% { opacity: 0; pointer-events: none; }
        }
        
        /* Loading */
        .loading-screen {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        
        .loading-screen.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(212, 175, 55, 0.3);
            border-top-color: #D4AF37;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loading">
        <div class="spinner mb-4"></div>
        <p class="text-white text-lg">Загрузка VR тура...</p>
    </div>

    <!-- Help Text -->
    <div class="help-text" id="help-text">
        🖱️ Зажмите и перетащите для обзора • Прокрутка для зума
    </div>

    <!-- VR Scene -->
    <div id="vr-container">
        <a-scene 
            embedded 
            loading-screen="enabled: false"
            vr-mode-ui="enabled: true"
            cursor="rayOrigin: mouse"
        >
            <!-- Assets -->
            <a-assets timeout="30000">
                @if($venue->vr_images)
                    @foreach($venue->vr_images_urls as $index => $image)
                        <img id="sky-{{ $index }}" src="{{ $image }}" crossorigin="anonymous">
                    @endforeach
                @else
                    <!-- Placeholder if no VR images -->
                    <img id="sky-placeholder" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/city.jpg" crossorigin="anonymous">
                @endif
            </a-assets>

            <!-- Sky (360 image) -->
            <a-sky 
                id="sky" 
                src="#sky-{{ $venue->vr_images ? '0' : 'placeholder' }}" 
                rotation="0 -90 0"
                animation__fade="property: material.opacity; from: 0; to: 1; dur: 500"
            ></a-sky>

            <!-- Camera with look controls -->
            <a-entity 
                id="camera-rig" 
                position="0 1.6 0"
            >
                <a-camera 
                    look-controls="pointerLockEnabled: false; reverseMouseDrag: false"
                    wasd-controls="enabled: false"
                >
                    <!-- Reticle for VR mode -->
                    <a-entity 
                        cursor="fuse: true; fuseTimeout: 500"
                        position="0 0 -1"
                        geometry="primitive: ring; radiusInner: 0.02; radiusOuter: 0.03"
                        material="color: white; shader: flat"
                        visible="false"
                    ></a-entity>
                </a-camera>
            </a-entity>

            <!-- Info hotspots can be added here -->
            @if($venue->vr_hotspots ?? false)
                @foreach($venue->vr_hotspots as $hotspot)
                    <a-entity
                        class="hotspot"
                        position="{{ $hotspot['position'] }}"
                        geometry="primitive: sphere; radius: 0.2"
                        material="color: #D4AF37; opacity: 0.8"
                        event-set__mouseenter="material.opacity: 1; scale: 1.2 1.2 1.2"
                        event-set__mouseleave="material.opacity: 0.8; scale: 1 1 1"
                        data-info="{{ $hotspot['info'] }}"
                    ></a-entity>
                @endforeach
            @endif
        </a-scene>
    </div>

    <!-- UI Overlay - Top -->
    <div class="ui-overlay top-0 left-0 right-0 p-4">
        <div class="flex justify-between items-start">
            <!-- Back button & Title -->
            <div class="info-panel">
                <div class="flex items-center gap-4 mb-4">
                    <a href="{{ route('venues.show', $venue->slug) }}" class="control-btn">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold">{{ $venue->name }}</h1>
                        <p class="text-gray-400 text-sm">VR тур 360°</p>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <div class="controls">
                <button class="control-btn" onclick="toggleFullscreen()" title="Полный экран">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                    </svg>
                </button>
                <button class="control-btn" onclick="document.querySelector('a-scene').enterVR()" title="VR режим">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
                <button class="control-btn" onclick="resetView()" title="Сбросить вид">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- UI Overlay - Bottom (Thumbnails) -->
    @if($venue->vr_images && count($venue->vr_images) > 1)
        <div class="ui-overlay bottom-0 left-0 right-0 p-4">
            <div class="info-panel mx-auto" style="max-width: 600px;">
                <p class="text-sm text-gray-400 mb-2">Выберите панораму:</p>
                <div class="thumbnail-list">
                    @foreach($venue->vr_images_urls as $index => $image)
                        <img 
                            src="{{ $image }}" 
                            class="thumbnail {{ $index === 0 ? 'active' : '' }}" 
                            onclick="changeSky({{ $index }}, this)"
                            alt="Панорама {{ $index + 1 }}"
                        >
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- External VR tour link -->
    @if($venue->vr_tour_url)
        <div class="ui-overlay bottom-4 right-4">
            <a href="{{ $venue->vr_tour_url }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-xl font-medium hover:opacity-90 transition-opacity">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Открыть полный VR тур
            </a>
        </div>
    @endif

    <script>
        // Hide loading screen when scene is loaded
        document.querySelector('a-scene').addEventListener('loaded', function () {
            setTimeout(() => {
                document.getElementById('loading').classList.add('hidden');
            }, 500);
        });

        // Change sky image
        function changeSky(index, element) {
            const sky = document.getElementById('sky');
            sky.setAttribute('src', '#sky-' + index);
            
            // Update active thumbnail
            document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
            element.classList.add('active');
        }

        // Toggle fullscreen
        function toggleFullscreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                document.exitFullscreen();
            }
        }

        // Reset camera view
        function resetView() {
            const camera = document.querySelector('a-camera');
            camera.setAttribute('rotation', '0 0 0');
        }

        // Auto-rotate option
        let autoRotate = false;
        function toggleAutoRotate() {
            autoRotate = !autoRotate;
            const sky = document.getElementById('sky');
            if (autoRotate) {
                sky.setAttribute('animation', 'property: rotation; to: 0 360 0; loop: true; dur: 60000; easing: linear');
            } else {
                sky.removeAttribute('animation');
            }
        }

        // Hide help text after interaction
        document.addEventListener('mousedown', function() {
            document.getElementById('help-text').style.display = 'none';
        });
    </script>
</body>
</html>
