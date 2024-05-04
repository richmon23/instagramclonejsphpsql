    const getId=(id)=>document.getElementById(id);
    const getSl=(selector)=>document.querySelector(selector);

    const imageElement=getSl(".heroimg");
    let slideIndex=0;
    const IMAGE_DATA=[
        "http://localhost/insta_js/public/1.png",
        "http://localhost/insta_js/public/2.png",
        "http://localhost/insta_js/public/3.png",
        "http://localhost/insta_js/public/4.png",
    ];



if(password){

    show_hide_password.addEventListener("click",function(){

        if(password.type==="password"){
            password.type="text";
            show_hide_password.innerText="Hide";
        }else{
            password.type="password";
            show_hide_password.innerText="Show";
        }

    })

    // SLIDER IMAGES
    function showSlides(){
        const slider=()=>{
           slideIndex++;
           imageElement.style.backgroundImage=`url(${IMAGE_DATA[slideIndex]})`;
           if(slideIndex==3) slideIndex =-1;
        }
      let timer= setInterval(slider,3000)
    }
    
    showSlides()
    
    

}