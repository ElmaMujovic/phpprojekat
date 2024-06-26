function myFunction() {
    const name = document.getElementById('adnews');
    name.hidden=false;
    };

function myFunctionCourse() {
        const name = document.getElementById('adcourse');
        name.hidden=false;
 };
 function myFunctionTest() {
    const name = document.getElementById('adcourse');
    name.hidden=true;
};

function Funct(idE){
    const nameee = document.getElementById('testid');
    nameee.value=idE;
}
function funTQ() {
    const namediv = document.getElementById('quid');
    const namebtn = document.getElementById('testbtn');
    namediv.hidden=false;
    namebtn.hidden=true;
};

var timeoutHandle;
function countdown(minutes) {
    var seconds = 60;
    var mins = minutes
    function tick() {
        var counter = document.getElementById("timer");
        var current_minutes = mins-1
        seconds--;
        counter.innerHTML
        current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            timeoutHandle=setTimeout(tick, 1000);
        } else {

            if(mins > 1){

               setTimeout(function () { countdown(mins - 1); }, 1000);

            }
            else{
                alert('Vreme je isteklo!');
                const namediv = document.getElementById('quid');
                const namebtn = document.getElementById('testbtn');
                namediv.hidden=true;
                namebtn.hidden=false;
            }
        }
    }
    tick();
}
countdown(2);
