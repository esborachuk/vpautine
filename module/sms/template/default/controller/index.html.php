<?php if($this->getVar('userSms')): ?>
    <ul style="color: #000;">
        <?php $i = 1; foreach($this->getVar('userSms') as $sms): ?>
            <li>
                <span>
                    <?php echo $i; ?>
                </span>
                <span>
                    <?php echo $sms['phone_number']; ?>
                </span>
                <span>
                    <?php echo $sms['sms_text']; ?>
                </span>
                <span>
                    <?php echo date('Y-m-d', $sms['time_stamp']); ?>
                </span>
                <span>
                    <a href="<?php echo $sms['viewer_link'] ?>">
                        <?php echo $sms['viewer_image'] ?>
                    </a>
                </span>
            </li>
            <?php $i++; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>