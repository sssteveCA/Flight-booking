
$(()=>{
    let footer: JQuery = $('.footer');
    if(footer.length){
        footerPosition(footer);
        $(window).on('resize',()=>{
            footerPosition(footer);
        });
    }
})


/**
 * Put bottom footer corner at bottom of viewport if content isn't high enough
 * @param footerEl 
 */
function footerPosition(footerEl: JQuery): void{
    let windowHeight: number = $(window).height() as number;
    let bodyHeight: number = $('body').height() as number;
    //let footerPos: JQuery.Coordinates = footerEl.position();
    let footerHeight: number = footerEl.height() as number;
    /* console.log("footerHeight => "+footerHeight);
    console.log("bodyHeight => "+bodyHeight);
    console.log("windowHeight => "+windowHeight); */ 
    if(bodyHeight < (windowHeight - footerHeight)){
        footerEl.css({
            position: 'fixed',
            bottom: '0px'
        });
    }
    else{
        footerEl.css({
            position: 'static'
        });
    }
    footerEl.removeClass("invisible");
    
}