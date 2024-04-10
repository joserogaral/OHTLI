
let slider = document.querySelector('.commes');
let sliderint = document.querySelectorAll('.msgenvi');
let contador = 1;
let tamano = sliderint[0].clientWidth;
let intervalo = 3000;

setInterval(function tiempo(){
slides();
}, intervalo);

function slides(){
slider.style.transform =  'translate('+ (- tamano * contador) + 'px)';
slider.style.transition =  'transform 1s';
contador++;

if (contador === sliderint.length){
contador = 0;

setTimeout(function(){
    slider.style.transform =  'translate(0px)';
    slider.style.transition =  'transform 0s';
}, intervalo) 

} 
}















