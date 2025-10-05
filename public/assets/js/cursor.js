document.addEventListener('DOMContentLoaded', () => {
  const canvas = document.getElementById('emberCanvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }
  resizeCanvas();
  window.addEventListener('resize', resizeCanvas);
  let cursor = { x: 0, y: 0 };
  let embers = [];
  let smoke = [];
  document.addEventListener('mousemove', (e) => {
    cursor.x = e.clientX;
    cursor.y = e.clientY;
    for (let i = 0; i < 3; i++) {
      embers.push({
        x: cursor.x,
        y: cursor.y,
        radius: Math.random() * 3 + 2,
        alpha: 0.8,
        dx: (Math.random() - 0.5) * 1.5,
        dy: -Math.random() * 2,
        color: `rgba(${140 + Math.random()*20}, ${60 + Math.random()*20}, 0,`
      });
    }
    smoke.push({
      x: cursor.x,
      y: cursor.y,
      radius: Math.random() * 10 + 10,
      alpha: 0.2,
      dx: (Math.random() - 0.5) * 0.5,
      dy: -Math.random() * 0.5,
      color: 'rgba(80,80,80,'
    });
  });

  function drawHeatRipple(x, y) {
    const rippleSize = 200;
    const flicker = 0.05 + Math.random() * 0.05;
    const gradient = ctx.createRadialGradient(x, y, 0, x, y, rippleSize);
    gradient.addColorStop(0, `rgba(255,255,255,${flicker})`);
    gradient.addColorStop(1, 'rgba(255,255,255,0)');
    ctx.fillStyle = gradient;
    ctx.beginPath();
    ctx.arc(x, y, rippleSize, 0, Math.PI * 2);
    ctx.fill();
  }

  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawHeatRipple(cursor.x, cursor.y);
    for (let i = smoke.length - 1; i >= 0; i--) {
      const s = smoke[i];
      s.x += s.dx;
      s.y += s.dy;
      s.alpha -= 0.002;
      if (s.alpha <= 0) {
        smoke.splice(i, 1);
      } else {
        ctx.beginPath();
        ctx.arc(s.x, s.y, s.radius, 0, Math.PI * 2);
        ctx.fillStyle = s.color + s.alpha + ')';
        ctx.fill();
      }
    }
    for (let i = embers.length - 1; i >= 0; i--) {
      const p = embers[i];
      p.x += p.dx;
      p.y += p.dy;
      p.alpha -= 0.02;
      if (p.alpha <= 0) {
        embers.splice(i, 1);
      } else {
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
        ctx.fillStyle = p.color + p.alpha + ')';
        ctx.fill();
      }
    }
    requestAnimationFrame(animate);
  }
  animate();
});
