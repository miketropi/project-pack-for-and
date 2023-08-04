<?php 
/**
 * Organisation detail box
 */

$wp_user_id = $_GET['user_id'];
$sf_account_json = get_user_meta($wp_user_id, '__salesforce_account_json', true);
$sf_contact_id = get_user_meta($wp_user_id, 'salesforce_contact_id', true);
$sf_account_id = get_user_meta($wp_user_id, '__salesforce_account_id', true);
$sf_account_data = json_decode($sf_account_json, true);
$sf_contact_data = ppsf_get_contact($sf_contact_id);
$sf_opportunity_data = ppsf_get_opportunity($sf_account_id);

$member_journey_arr = array(
    'Maintains_an_Employee_Network__c' => $sf_account_data['Maintains_an_Employee_Network__c'],
    'Recruitment_Review__c' => $sf_account_data['Recruitment_Review__c'],
    'Workplace_Adjustment_Policy_or_Procedure__c' => $sf_account_data['Workplace_Adjustment_Policy_or_Procedure__c'],
    'Accessibility_Action_Plan_in_place__c' => $sf_account_data['Accessibility_Action_Plan_in_place__c'],
);

$sf_org_details_arr = array(
    'Name' => $sf_account_data['Name'],
    'Type' => $sf_account_data['Type'],
    'Membership Level' => $sf_account_data['Membership_Level__c'],
    'Member Hours Remaining' => $sf_account_data['Memb_Hours_Remain_Org__c'],
    'Membership Renewal Month' => $sf_account_data['Membership_Renewal_Month__c'],
    'Membership Status' => $sf_account_data['Membership_Status__c'],
);

$sf_contact_arr = array(
    'Contact name' => $sf_contact_data['Salutation'] .' '. $sf_contact_data['Name'],
    'Email' => '<a href="mailto:'. $sf_contact_data['Email'] .'">'. $sf_contact_data['Email'] .'</a>',
    'Phone number' => '<a href="tel:'. $sf_contact_data['Phone'] .'">'. $sf_contact_data['Phone'] .'</a>',
);
?>
<?php if (! empty($sf_account_data)): ?>
    <h2>Organisation details</h2>
    <table class="form-table" id="org-details__box">
        <tbody>
            <?php foreach ($sf_org_details_arr as $key => $value): ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <th>Member Journey</th>
                    <td>
                        <?php pp_org_member_journey($member_journey_arr); ?>
                    </td>
                </tr>
                <tr>
                    <th>Contact details</th>
                    <td>
                        <ul>
                            <?php foreach ($sf_contact_arr as $key => $value): ?>
                                <li>
                                    <strong><?php echo $key. ': '; ?></strong>
                                    <?php echo $value; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>Opportunities</th>
                    <td>
                        <ul>
                            <?php foreach ($sf_opportunity_data['records'] as $key => $opportunity): ?>
                                <li>
                                    <?php echo $opportunity['Name']; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
        </tbody>
    </table>
<?php endif; ?>

