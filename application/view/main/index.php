<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bento Pro</title>
    <link rel="stylesheet" href="/application/assets/css/style.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="logo">Bp</div>
      <div class="nav-menu">
        <div class="nav-item active">Compositions</div>
        <div class="nav-item">Web</div>
        <div class="nav-item">Mobile</div>
        <div class="nav-item">Components</div>
        <div class="nav-item">Assets</div>
      </div>
      <div class="nav-actions">
        <button class="search-btn">🔍</button>
        <a href="/log/index" class="sign-in-btn">Sign In</a>
      </div>
    </nav>

    <main class="main-content">
      <h1 class="hero-title">
        BENTO PRO
        <span class="version-tag">v.1</span>
      </h1>
      <p class="subtitle">MULTIPURPOSE</p>

      <div class="cards-container">
        <div class="card">
          <div class="card-indicator blue"></div>
          <div class="preview-box">
            <img
              src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Crect x='3' y='3' width='18' height='18' rx='2' ry='2'%3E%3C/rect%3E%3Ccircle cx='8.5' cy='8.5' r='1.5'%3E%3C/circle%3E%3Cpolyline points='21 15 16 10 5 21'%3E%3C/polyline%3E%3C/svg%3E"
              alt="Preview"
            />
          </div>
        </div>

        <div class="card">
          <div class="card-indicator green"></div>
          <div class="hexagon-grid">
            <div class="hexagon">⚡</div>
            <div class="hexagon">🎨</div>
            <div class="hexagon">🔧</div>
            <div class="hexagon">📱</div>
            <div class="hexagon">💻</div>
            <div class="hexagon">🎮</div>
          </div>
        </div>

        <div class="card">
          <div class="card-indicator blue"></div>
          <div class="action-buttons">
            <button class="action-btn">📸</button>
            <button class="action-btn">🎨</button>
            <button class="action-btn">⚡</button>
            <button class="action-btn">🔧</button>
          </div>
        </div>
      </div>
    </main>

    <script type="module" src="/application/assets/js/main.js"></script>
  </body>
</html>
