/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */



/* --------------------------------
    Sales order approval dialog boxes
/** -------------------------------- */
const approvalMsg = () => {
    let msgBox = document.getElementById('msg')
    var approveBtn = document.getElementById('approve-btn')
    //let dialogBoxWrapper = document.getElementById('dialog-box-wrapper')
    msgBox.style.display = 'block'
    //dialogBoxWrapper.style.display = 'block'
    approveBtn.addEventListener('click', approvalMsg, false)
}
// Fixed bootstrap dialog hiding behind backdrop
$('#approval-modal').appendTo("body")


/* --------------------------------
    Toast Notification
/** -------------------------------- */

var button = document.getElementById('confirm-order-btn');
var slideout = document.getElementById('success-alert');

button.onclick = function() {
  slideout.classList.toggle('visible');
};
