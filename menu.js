function scrollToCuisine() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    let sectionId;

    if (searchInput.includes('sri lankan')) {
        sectionId = 'sri-lankan';
    } else if (searchInput.includes('chinese')) {
        sectionId = 'chinese';
    } else if (searchInput.includes('italian')) {
        sectionId = 'italian';
    }

    if (sectionId) {
        document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
    } else {
        alert('Cuisine type not found. Please enter Sri Lankan, Chinese, or Italian.');
    }
}
