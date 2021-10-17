export default function () {
  // Mobile
  new Splide( '.hero__slider--sm-js', {
    arrows : false,
    autoplay : true,
  } ).mount();

  // Desktop
  new Splide( '.hero__slider--md-js', {
    arrows : false,
    autoplay : true,
  } ).mount();
}