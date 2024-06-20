var utilityDropdownVisible = false;
var siteProgressDropdownVisible = false;

function showSelectedOption(selectElement) {
    var utilityDropdownContainer = document.getElementById('utilityDropdownContainer');
    var twoDUnitPlans = document.querySelector('.two-d-unitplans');
    var threeDUnitPlans = document.querySelector('.three-d-unitplans');
    var sitedropdown = document.getElementById('siteProgressDropdownContainer');

    twoDUnitPlans.style.display = 'block'; 
    threeDUnitPlans.style.display = 'block'; 
    sitedropdown.style.display = 'none';

    var selectedOption = selectElement.value;

    if (selectedOption === 'site') {
        sitedropdown.style.display = 'block';
    }

    toggleUtilityDropdown();
}

function toggleSiteProgressDropdown() {
    var siteProgressDropdownContainer = document.getElementById('siteProgressDropdownContainer');
    var twoDUnitPlans = document.querySelector('.two-d-unitplans');
    var threeDUnitPlans = document.querySelector('.three-d-unitplans');
    var constructionImagesContainer = document.querySelector('.construction-img-container');
    var utilityDropdownContainer = document.getElementById('utilityDropdownContainer');
    var siteProgressButton = document.getElementById('siteProgressButton');
    var februaryConstructionImagesContainer = document.getElementById('februaryConstructionImagesContainer');

    // Display February images by default when siteprogress button is clicked
    februaryConstructionImagesContainer.style.display = 'block';

    constructionImagesContainer.style.display = 'none';
    siteProgressDropdownContainer.style.display = 'block';
    twoDUnitPlans.style.display = 'none';
    threeDUnitPlans.style.display = 'none';
    utilityDropdownContainer.style.display = 'none';

    if (!siteProgressDropdownVisible) {
        document.querySelectorAll('.floorplans-towerA, .floorplans-towerB, .floorplans-towerC').forEach(tower => {
            tower.style.display = 'none';
        });
    }

    siteProgressDropdownVisible = !siteProgressDropdownVisible;
    utilityDropdownVisible = false;
    removeActiveClass();
    siteProgressButton.classList.add('active');
    document.getElementById('unitPlansButton').classList.remove('active');
}

// Other functions remain unchanged

function toggleUtilityDropdown() {
    var utilityDropdownContainer = document.getElementById('utilityDropdownContainer');
    var twoDUnitPlans = document.querySelector('.two-d-unitplans');
    var threeDUnitPlans = document.querySelector('.three-d-unitplans');
    var constructionImagesContainer = document.querySelector('.construction-img-container');
    var sitedropdown = document.getElementById('siteProgressDropdownContainer');
    var unitPlansButton = document.getElementById('unitPlansButton'); // Add this line
    var februaryConstructionImagesContainer = document.getElementById('februaryConstructionImagesContainer');


    februaryConstructionImagesContainer.style.display='none'

    sitedropdown.style.display = 'none';
    constructionImagesContainer.style.display = 'none';
    twoDUnitPlans.style.display = 'block';
    threeDUnitPlans.style.display = 'block';

    if (!utilityDropdownVisible) {
        utilityDropdownContainer.style.display = 'block';
    } else {
        utilityDropdownContainer.style.display = 'none';
        twoDUnitPlans.style.display = 'block';
        threeDUnitPlans.style.display = 'none';
    }

    utilityDropdownVisible = !utilityDropdownVisible;
    siteProgressDropdownVisible = false;
    removeActiveClass();

    var unitPlansButton = document.getElementById('unitPlansButton');
    unitPlansButton.classList.add('active');
    document.getElementById('siteProgressButton').classList.remove('active');
}

function removeActiveClass() {
    var buttons = document.querySelectorAll('.dropdown-btn');
    buttons.forEach(button => {
        button.classList.remove('active');
    });
}

function showConstructionImages() {
    var twoDUnitPlans = document.querySelector('.two-d-unitplans');
    var threeDUnitPlans = document.querySelector('.three-d-unitplans');
    var constructionImagesContainer = document.querySelector('.construction-img-container');
    var sitedropdown = document.getElementById('siteProgressDropdownContainer');
    var utilityDropdownContainer = document.getElementById('utilityDropdownContainer');
    var SiteProgressOption = document.querySelector('.februaryConstructionImagesContainer');

    utilityDropdownContainer.style.display = 'none';
    sitedropdown.style.display = 'block';
    twoDUnitPlans.style.display = 'none';
    threeDUnitPlans.style.display = 'none';
    SiteProgressOption.style.display='none'

    document.querySelectorAll('.floorplans-towerA, .floorplans-towerB, .floorplans-towerC').forEach(tower => {
        tower.style.display = 'none';
    });

    removeActiveClass();
    document.getElementById('siteProgressButton').classList.add('active');
   // document.getElementById('unitPlansButton').classList.remove('active');
}

function preloadImages() {
    var imageUrls = [
        // Add the correct image URLs here
        './img/unitplans/u-1.jpg',
        './img/unitplans/u-2.jpg',
        './img/unitplans/u-7.jpg',
        "./img/unitplans/u-5.jpg",
        "./img/unitplans/u-4.jpg",
        './img/unitplans/u-3.jpg',
        './img/unitplans/3d/3d-2-1.jpg',
        './img/unitplans/3d/3d-2-2.jpg',
        './img/unitplans/3d/3d-2-3.jpg',
        './img/construction/c-4.jpg',
        './img/construction/c-5.jpg',
    ];

    imageUrls.forEach(function (imageUrl) {
        var img = new Image();
        img.src = imageUrl;
    });
}
function showSiteProgressOption(selectElement) {
    var selectedOption = selectElement.value;
    var januaryConstructionImagesContainer = document.getElementById('januaryConstructionImagesContainer');
    var februaryConstructionImagesContainer = document.getElementById('februaryConstructionImagesContainer');

    if (selectedOption === 'progress1') {
        januaryConstructionImagesContainer.style.display = 'block';
        februaryConstructionImagesContainer.style.display = 'none';
    } else if (selectedOption === 'progress2') {
        januaryConstructionImagesContainer.style.display = 'none';
        februaryConstructionImagesContainer.style.display = 'block';
    }
}

window.onload = function () {
    preloadImages();
    showSelectedOption(document.getElementById('interestedSelect'));
    var twoDUnitPlans = document.querySelector('.two-d-unitplans');
    var threeDUnitPlans = document.querySelector('.three-d-unitplans');
    var constructionImagesContainer = document.querySelector('.construction-img-container');
    var januaryConstructionImagesContainer = document.getElementById('januaryConstructionImagesContainer');
    var februaryConstructionImagesContainer = document.getElementById('februaryConstructionImagesContainer');

    twoDUnitPlans.style.display = 'none';
    threeDUnitPlans.style.display = 'none';
    constructionImagesContainer.style.display = 'none';
    januaryConstructionImagesContainer.style.display = 'block';  // Display January images by default
    februaryConstructionImagesContainer.style.display = 'none';
};