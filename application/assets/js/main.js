// Add smooth hover effects to cards
document.querySelectorAll('.card').forEach(card => {
card.addEventListener('mousemove', (e) => {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    
    const rotateX = ((y - centerY) / centerY) * 10;
    const rotateY = ((centerX - x) / centerX) * 10;
    
    card.style.transform = `
    perspective(1000px)
    rotateX(${rotateX}deg)
    rotateY(${rotateY}deg)
    translateZ(10px)
    `;
    
    // Add highlight effect
    const shine = `radial-gradient(
    circle at ${x}px ${y}px,
    rgba(255,255,255,0.1) 0%,
    rgba(255,255,255,0.05) 30%,
    rgba(255,255,255,0) 70%
    )`;
    
    card.style.background = `${shine}, var(--card-bg)`;
});

card.addEventListener('mouseleave', () => {
    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
    card.style.background = 'var(--card-bg)';
});
});

// Add active state to nav items
document.querySelectorAll('.nav-item').forEach(item => {
item.addEventListener('click', () => {
    document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
    item.classList.add('active');
});
});

// Add hover effect to hexagons
document.querySelectorAll('.hexagon').forEach(hexagon => {
hexagon.addEventListener('mouseenter', () => {
    hexagon.style.transform = 'rotate(30deg) scale(1.1)';
});

hexagon.addEventListener('mouseleave', () => {
    hexagon.style.transform = 'rotate(30deg)';
});
});



function modemain() {
    document.querySelector(".custom-model-main").classList.add("model-open");
}

function closemode() {
    document.querySelector(".custom-model-main").classList.remove("model-open");
}


function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","/main/search?search="+str,true);
    xmlhttp.send();
  }