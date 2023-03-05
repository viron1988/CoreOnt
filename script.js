function showImage(id) {
  const imageContainers = document.querySelectorAll('.image-container');
  imageContainers.forEach((container) => {
    if (container.id === id) {
      container.style.display = 'block';
    } else {
      container.style.display = 'none';
    }
  });
}
