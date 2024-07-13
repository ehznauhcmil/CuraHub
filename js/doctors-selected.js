const doctorList = document.querySelector('.doctor-list');

doctorList.addEventListener('click', (event) => {
  const clickedItem = event.target.closest('.list-item'); // Find the closest parent with the 'list-item' class

  if (clickedItem) {
    const selectedIndex = clickedItem.dataset.index;

    // Remove 'selected' class from other items
    const items = doctorList.querySelectorAll('.list-item');
    items.forEach(item => item.classList.remove('selected'));

    // Add 'selected' class to the clicked item
    clickedItem.classList.add('selected');

    // Use the selectedIndex for further actions (e.g., fetch more details)
    console.log("Selected doctor index:", selectedIndex);
    // ... your logic here
  }
});

