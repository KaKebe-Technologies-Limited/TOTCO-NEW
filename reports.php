<?php
$val = $myService->getValue(); // Makes an API and database call


<div class="service-container" data-service="<?= htmlspecialchars($myService->getValue()) ?>"></div>

<script>
    $(document).ready(function() {
        $('.service-container').each(function() {
            var container = $(this);
            var service = container.data('service');

            // Var "service" now contains the value of $myService->getValue();
        });
    });
</script>