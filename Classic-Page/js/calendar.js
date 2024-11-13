
function digitalclock() {
    let datefuntion = new Date()
    let myhours = datefuntion.getHours()
    let myminutes = datefuntion.getMinutes()
    let mysecond = datefuntion.getSeconds()
    let timeformat = 'AM'

    timeformat = myhours >= 12 ? 'PM' : 'AM'
    myhours = myhours == 0 ? 12 : myhours
    myhours = myhours > 12 ? myhours - 12 : myhours
    myhours = myhours < 10 ? '0' + myhours : myhours

    myminutes = myminutes < 10 ? '0' + myminutes : myminutes
    mysecond = mysecond < 10 ? '0' + mysecond : mysecond

    document.querySelector('.Hours').innerHTML = myhours
    document.querySelector('.Minutes').innerHTML = myminutes
    document.querySelector('.Seconds').innerHTML = mysecond
    document.querySelector('.Format').innerHTML = timeformat
}
setInterval(digitalclock, 1000)

var month = document.getElementById("month");
var todayDate = document.getElementById("date");
var daysTag = document.querySelector(".calendar .date");

let date = new Date()
var currYear = date.getFullYear();
var currMonth = date.getMonth();
let montharr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

function renderdate() {
    // console.log(obj)

    var lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(); // getting last day of month

    var firstDateOfMonth = new Date(currYear, currMonth, 1);
    var firstDayofMonth = firstDateOfMonth.getDay(); //getting first day of month
    var lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); //getting last date of previous month

    var lastDayOfMonth = new Date(currYear, currMonth, lastDateofMonth).getDay();
    var disabledDays = new Set([0, 1, 6]);
    todayDate.innerText = date.toDateString();
    month.innerHTML = `${montharr[currMonth]} ${currYear}`;

    let divTag = "";

    for (var i = firstDayofMonth; i > 0; i--) {
        divTag += `<div class = "inactive"> ${lastDateofLastMonth - i + 1}</div>`
    }

    for (var i = 1; i <= lastDateofMonth; i++) {
        // var result = new Date(firstDateOfMonth);
        // result.setDate(firstDateOfMonth.getDay() + i);
        // if (disabledDays.has(result.getDay())) {
        //     divTag += `<div class ="inactive">${i}</div>`
        // } else {
        divTag += `<div class ="day">${i}</div>`
        // }

    }
    for (var i = lastDayOfMonth; i < 6; i++) {
        divTag += `<div class = "inactive"> ${i - lastDayOfMonth + 1}</div>`
    }

    daysTag.innerHTML = divTag
    var script = document.createElement('script');
    script.type = "text/javascript";
    script.src = "./js/dateselect.js";

    document.getElementsByTagName('head')[0].appendChild(script);
}


function movedate(para) {
    if (para == 'prev') {
        currMonth = currMonth - 1;
        if (currMonth < 0) {
            currMonth = 11;
            currYear--;
        }
    }
    else if (para == 'next') {
        currMonth = currMonth + 1;
        if (currMonth > 11) {
            currMonth = 0;
            currYear++;
        }
    }
    renderdate()
}