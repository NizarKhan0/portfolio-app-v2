<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body style="font-family: sans-serif; padding: 2rem; background: #f4f4f4;">
    <div style="max-width: 600px; margin: auto; background: white; border-radius: 8px; padding: 2rem;">
        <h2 style="color: #4f46e5;">New Portfolio Message</h2>
        <hr style="border: none; border-top: 1px solid #e5e7eb;">
        <p><strong>From:</strong> <?php echo e($senderName ?: 'Not provided'); ?> (<?php echo e($senderEmail); ?>)</p>
        <p><strong>Message:</strong></p>
        <p style="background: #f9fafb; padding: 1rem; border-radius: 6px;"><?php echo e($senderMessage); ?></p>
        <hr style="border: none; border-top: 1px solid #e5e7eb;">
        <p style="font-size: 12px; color: #9ca3af;">Sent via your portfolio contact form.</p>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\livewire-app\resources\views/emails/contact-notification.blade.php ENDPATH**/ ?>