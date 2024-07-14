document.getElementById('user-button').classList.add('menu-buttons-selected');

function selectNavItem(selectedNav) {
    // Hide all content divs
    document.getElementById('users').style.display = 'none';
    document.getElementById('appointments').style.display = 'none';
    document.getElementById('register').style.display = 'none';

    document.getElementById('user-button').classList.remove('menu-buttons-selected');
    document.getElementById('appointments-button').classList.remove('menu-buttons-selected');
    document.getElementById('register-button').classList.remove('menu-buttons-selected');

    // Show the selected content div
    if (selectedNav === 'nav1') {
        document.getElementById('users').style.display = 'flex';
        document.getElementById('user-button').classList.add('menu-buttons-selected');
    } else if (selectedNav === 'nav2') {
        document.getElementById('appointments').style.display = 'flex';
        document.getElementById('appointments-button').classList.add('menu-buttons-selected');
    } else if (selectedNav === 'nav3') {
        document.getElementById('register').style.display = 'flex';
        document.getElementById('register-button').classList.add('menu-buttons-selected');
    }
}

