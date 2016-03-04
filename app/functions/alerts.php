<?php
  function bootstrap_alert ($alerts, $required_alert, $alert_title = "no_title", $alert_dismissible = true) {
    
    $bootstrap_alert_classes_mapping = array(
        "success" => "alert alert-success",
        "info"    => "alert alert-info",
        "warning" => "alert alert-warning",
        "danger"  => "alert alert-danger"
    );
    
    if (array_key_exists($required_alert, $alerts)) {
        
        $alert_content = $alerts[$required_alert]["message"];
        $alert_context = $alerts[$required_alert]["context"];
        
        if (!array_key_exists($alert_context,$bootstrap_alert_classes_mapping)) {
            $alert_context = "info";
        }
 
        $bootstrap_alert_class = $bootstrap_alert_classes_mapping[$alert_context];
 
        if ($alert_title == "no_title") {
            if (isset($alerts[$required_alert]["title"])) {
                $alert_title = $alerts[$required_alert]["title"];
            }
        }
        
        if ($alert_dismissible == true) {
            if (isset($alerts[$required_alert]["dismissible"])) {
                $alert_dismissible = $alerts[$required_alert]["dismissible"];
            }
        }
        
        if ($alert_dismissible) {
            $bootstrap_alert_class = $bootstrap_alert_class." alert-dismissible";
        }
        
        $add = "";
        
        if ($alert_dismissible) {
            $add = '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
        }
        
        if ($alert_title !== "no_title") {
            $add = $add."<strong>".$alert_title."</strong> ";
        }
        
        $alert_content = $add.$alert_content;
 
        $alert = '<div class="'.$bootstrap_alert_class.'" role="alert">'.$alert_content."</div>";
            
        return($alert);
        
    }
  }
?>
