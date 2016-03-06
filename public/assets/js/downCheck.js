/**
 * Created by r-nishi on 16/03/06.
 */

/**
 *
 */
function downCheck()
{
    var index = document.myForm.mySelect.selectedIndex;
    var value = document.myForm.mySelect.options[index].value;
    alert(value);
}