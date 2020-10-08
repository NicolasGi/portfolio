import '../styles/styles.scss'

const scroll = function(callback){ window.setTimeout(callback, 1000/60) };

const elementToShow = document.querySelectorAll('.show-on-scroll')

function loop() {
    elementToShow.forEach((element)=>{
        if(isElementInViewport(element)){
            element.classList.add('is-visible')
        }else{
            element.classList.remove('is-visible')
        }
    })

    scroll(loop)
}

loop()

function isElementInViewport(el){
    let rect = el.getBoundingClientRect();
    return (
        (rect.top <= 0 && rect.bottom >= 0)
        ||
        (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) && rect.top <= (window.innerHeight || document.documentElement.clientHeight))
        ||
        (rect.top>=0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
    )
}



if (window.innerWidth >= 1025) {


    const img = document.querySelectorAll(".project-desc__img img");
    const project = document.querySelectorAll(".project-desc__img")
    function moveThis(x, y) {
        img.forEach(e => {
            e.style.transform = `translate(${x}px, ${y}px)`;
        })
    }

    let positionX = null;
    let positionY = null;
    document.onmousemove = ev => {
        positionX = ev.clientX/4;
        positionY = ev.clientY/5;
        moveThis(positionX, positionY)
    }


}


// profile mouve
/*const root = document.getElementById('portrait');

const mouse_monitor = function(e) {
    let x = e.clientX/innerWidth;
    let y = e.clientY/innerHeight;

    let move_x = (x>0.5) ? '-30px' : '30px';
    let move_y = (y>0.5) ? '-20px' : '20px';

    root.style.setProperty("--translate-x", move_x);
    root.style.setProperty("--translate-y", move_y);
}

root.addEventListener("mousemove", mouse_monitor);

*/
//threeJs
/*
import THREE from "./postprocessing/three";
import { EffectComposer  } from './postprocessing/EffectComposer.js';
//import { RenderPass } from './postprocessing/RenderPass';
//import { ShaderPass } from './postprocessing/ShaderPass';




let scene = new THREE.Scene();
let camera = new THREE.PerspectiveCamera( 75, window.innerWidth/window.innerHeight, 0.1, 1000 );

let renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth, window.innerHeight );
document.body.appendChild( renderer.domElement );


camera.position.z = 5;

let animate = function () {
    requestAnimationFrame( animate );

    mesh.rotation.x += 0;
    mesh.rotation.y += 0;

    composer.render();

};

let TEXTURE = new THREE.TextureLoader().load('http://localhost/portfolio_wordpress/wp-content/themes/portefolio/assets/img/isn.PNG');

let mesh = new THREE.Mesh(
    new THREE.PlaneBufferGeometry( 7, 6, 1),
    new THREE.MeshBasicMaterial({map: TEXTURE})
)

let composer = new THREE.EffectComposer( renderer )
let renderPass = new RenderPass(scene, camera);
// rendering our scene with an image
composer.addPass(renderPass);

// our custom shader pass for the whole screen, to displace previous render
let customPass = new ShaderPass({vertexShader,fragmentShader});
// making sure we are rendring it.
customPass.renderToScreen = true;
composer.addPass(customPass);

// actually render scene with our shader pass
// instead of previous
// renderer.render(scene, camera);

animate()
*/