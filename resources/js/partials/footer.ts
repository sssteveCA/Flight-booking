
$(()=>{
    let footer: JQuery<HTMLDivElement> = $('.footer');
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
    let navbarHeight: number = $('.navbar').height() as number;
    let contentHeight: number = $('.content').height() as number;
    let windowHeight: number = $(window).height() as number;
    let windowInnerHeight: number = window.innerHeight;
    let bodyHeight: number = $('body').height() as number;
    //let footerPos: JQuery.Coordinates = footerEl.position();
    let footerHeight: number = footerEl.height() as number;
    console.log("navbarHeight => "+navbarHeight);
    console.log("contentHeight => "+contentHeight);
    console.log("footerHeight => "+footerHeight);
    console.log("bodyHeight => "+bodyHeight);
    console.log("windowInnerHeight => "+windowInnerHeight);
    console.log("windowHeight => "+windowHeight);
    if((navbarHeight+contentHeight + 60) < (windowInnerHeight - footerHeight - 0.3)){
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