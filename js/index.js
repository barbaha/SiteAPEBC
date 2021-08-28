//animação de elementos da pagina com Superscrollorama
controller.addTween('.quem-somos',
  TweenMax.fromTo($('.quem-somos'), 2, 
  {css:{left: '-50px'}}, 
  {css:{left: '500px'}}) 
);
