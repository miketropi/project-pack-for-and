<?php 
/**
 * Organisation detail box
 */
?>

<h2>Organisation details</h2>
<table class="form-table" id="org-details__box">
    <tbody>
        <?php foreach ($template_org_data['org_details'] as $key => $value): ?>
            <tr>
                <th><?php echo $key; ?></th>
                <td><?php echo $value; ?></td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <th>Member Journey</th>
                <td>
                    <?php pp_org_member_journey($template_org_data['member_journey']); ?>
                </td>
            </tr>
            <tr>
                <th>Contact details</th>
                <td>
                    <ul>
                        <?php foreach ($template_org_data['contact'] as $key => $value): ?>
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
                        <?php foreach ($template_org_data['oppoturnity'] as $key => $opportunity): ?>
                            <li>
                                <?php echo $opportunity['Name']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
    </tbody>
</table>

