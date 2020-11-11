<?php
$title = 'Contact';


if (isset($_POST['submit'])) {
    if (!(
        empty($_POST['fname']) || empty($_POST['lname']) ||
        empty($_POST['email']) || empty($_POST['phone']) ||
        empty($_POST['city'])  || empty($_POST['comments'])
    )) {
        if (isset($_POST['email_list']) && $_POST['email_list'] == 'on') {
            $_POST['email_list'] = "TRUE";
        } else {
            $_POST['email_list'] = "FALSE";
        }

        require_once './php/DBConnection.php';
        $conn = new DBConnection();
        $conn->open();
        $conn->insertRecord('contact_form', $_POST);
        $conn->close();
    }
}



require_once './templates/header.php';

echo <<< _END
    <div class="main container">
        <section id="main">
            <div id="main-heading">
                <h1>$title</h1>
            </div>

            <p>Should you have any questions and/or complaints:</p>
            <ul style="line-height: normal;">
                <li>Call us at <b>305-555-1247</b>, or</li>
                <li>Email us at <a href="mailto: contact@compair.com">contact@compair.com</a>, or</li>
                <li>Fill out the following form:</li>
            </ul>

            <form id="contact-form" action="contact.php" method="POST" autocomplete="on">
                <table>
                    <tr>
                        <td>
                            <label for="fname">First Name <span>*</span> </label>
                            <input type="text" name="fname" id="fname" placeholder="John" required>
                        </td>
                        <td><label for="lname">Last Name <span>*</span> </label>
                            <input type="text" name="lname" id="lname" placeholder="Doe" required></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email <span>*</span> </label>
                            <input type="text" name="email" id="email" placeholder="email@example.com" autocomplete="off" required>
                        </td>
                        <td>
                            <label for="phone">Phone Number <span>*</span> </label>
                            <input type="text" name="phone" id="phone" placeholder="305-555-7777" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="city">City <span>*</span> </label>
                            <input type="text" name="city" id="city" placeholder="Miami" required>
                        </td>
                        <td>
                            <label for="zip">Zip Code <span>*</span> </label>
                            <input type="text" name="zip" id="zip" placeholder="33176">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="comments">Comments <span>*</span> </label>
                            <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Type your comments here..." required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>I'd Prefer To Be Contacted By</label>
                            <ul class="choice-list">
                                <li>
                                    <input type="radio" name="contact_pref" id="email-pref" value="email">
                                    <label for="email-pref">Email</label>
                                </li>
                                <li>
                                    <input type="radio" name="contact_pref" id="phone-pref" value="phone">
                                    <label for="phone-pref">Phone</label>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>How Did You Hear About Us?</label>
                            <select name="discovery_survey" id="discovery_survey">
                                <option value="">(select one)</option>
                                <option>Previous Customer</option>
                                <option>Google</option>
                                <option>Facebook</option>
                                <option>Twitter</option>
                                <option>Other Website</option>
                                <option>Newspaper Advertisement</option>
                                <option>TV Advertisement</option>
                                <option>Radio Advertisement</option>
                                <option>Sign on Service Truck</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Join Our Email List</label>
                            <ul class="choice-list">
                                <li>
                                    <input type="checkbox" name="email_list" id="join-email-list">
                                    <label for="join-email-list">Sign me up for the CompAir email list</label>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><span>*</span> Check that all fields with an asterisk are filled.</p>
                            <input type="submit" name="submit" value="SUBMIT">
                        </td>
                    </tr>
                </table>
            </form>
        </section>
_END;

//require_once './templates/aside.php';
require_once './templates/contact-table-print.php';

echo "\t</div>";

require_once './templates/footer.php';
?>
