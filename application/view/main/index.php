<?php $this->view('common/header'); ?>

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
          alt="Preview" />
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

        <a href="/quiz/upload">
          <button class="action-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cloud-upload">
              <path d="M12 13v8" />
              <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
              <path d="m8 17 4-4 4 4" />
            </svg>
          </button>
        </a>

        <a href="/quiz/pase">
          <button class="action-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-copy">
              <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
              <path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2" />
              <path d="M16 4h2a2 2 0 0 1 2 2v4" />
              <path d="M21 14H11" />
              <path d="m15 10-4 4 4 4" />
            </svg>
          </button>
        </a>

        <a href="#">
          <button class="action-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen">
              <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
              <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
            </svg>
          </button>
        </a>

        <a href="#">
          <button class="action-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line">
              <path d="m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2" />
              <path d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
              <path d="M8 18h1" />
            </svg>
          </button>
        </a>

      </div>
    </div>
  </div>
</main>

<?php $this->view('common/footer'); ?>