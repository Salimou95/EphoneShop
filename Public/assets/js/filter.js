document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const telephoneList = document.getElementById('telephone-list');
    const telephones = Array.from(telephoneList.getElementsByTagName('li'));

    searchInput.addEventListener('input', () => {
        const filterText = searchInput.value.toLowerCase();

        telephones.forEach(telephone => {
            const text = telephone.textContent.toLowerCase();
            telephone.setAttribute('data-visible', filterText !== '' && text.includes(filterText));
        });
    });
        });