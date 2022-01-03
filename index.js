root.style.setProperty('----sticky-top-right', '-25rem'); 
        } else if (size.classList.contains('font-size-5')) { 
            fontSize = '22px'; 
            root.style.setProperty('----sticky-top-left', '-12rem'); 
            root.style.setProperty('----sticky-top-right', '-35rem'); 
        } 
 
        // Mengganti font size pada HTML // (PERUBAHAN) 
        document.querySelector('html').style.fontSize = fontSize; 
    }) 
 
}) 
 
// remove active class from colors 
const changeActiveColorClass = () => { 
    colorPalette.forEach(colorPicker => { 
        colorPicker.classList.remove('active'); 
    }) 
} 
 
// Mengganti Primary Colors 
colorPalette.forEach(color => { 
    color.addEventListener('click', () => { 
        let primary; 
        // remove active class from colors 
        changeActiveColorClass(); 
 
        if (color.classList.contains('color-1')) { 
            primaryHue = 252; 
        } else if (color.classList.contains('color-2')) { 
            primaryHue = 52; 
        } else if (color.classList.contains('color-3')) { 
            primaryHue = 0; 
        } else if (color.classList.contains('color-4')) { 
            primaryHue = 152; 
        } else if (color.classList.contains('color-5')) { 
            primaryHue = 202; 
        } 
        color.classList.add('active'); 
 
        root.style.setProperty('--primary-color-hue', primaryHue); 
    }) 
}) 
 
 
 
 
// Theme Background values 
let lightColorLightness; 
let whiteColorLightness; 
let darkColorLightness; 
 
// changes background colors  
const changeBG = () => { 
    root.style.setProperty('--light-color-lightness', lightColorLightness); 
    root.style.setProperty('--white-color-lightness', whiteColorLightness); 
    root.style.setProperty('--dark-color-lightness', darkColorLightness); 
 
} 
 
Bg1.addEventListener('click', () => { 
    //add active class 
    Bg1.classList.add('active'); 
    // remove active class from the others 
    Bg2.classList.remove('active'); 
    Bg3.classList.remove('active'); 
    // remove customized changes from local storage 
    window.location.reload(); 
}); 
 
Bg2.addEventListener('click', () => { 
    darkColorLightness = '95%'; 
    whiteColorLightness = '20%'; 
    lightColorLightness = '15%'; 
 
    //add active class 
    Bg2.classList.add('active'); 
    // remove active class from the others 
    Bg1.classList.remove('active'); 
    Bg3.classList.remove('active'); 
    changeBG(); 
}); 
 
Bg3.addEventListener('click', () => { 
    darkColorLightness = '95%'; 
    whiteColorLightness = '10%'; 
    lightColorLightness = '0%'; 
 
    //add active class 
    Bg3.classList.add('active'); 
    // remove active class from the others 
    Bg1.classList.remove('active'); 
    Bg2.classList.remove('active'); 
    changeBG(); 
}); 
 
 
// END
