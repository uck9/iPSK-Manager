<?php

/**
 *@license
 *Copyright (c) 2019 Cisco and/or its affiliates.
 *
 *This software is licensed to you under the terms of the Cisco Sample
 *Code License, Version 1.1 (the "License"). You may obtain a copy of the
 *License at
 *
 *			   https://developer.cisco.com/docs/licenses
 *
 *All use of the material herein must be in accordance with the terms of
 *the License. All rights not expressly granted by the License are
 *reserved. Unless required by applicable law or agreed to separately in
 *writing, software distributed under the License is distributed on an "AS
 *IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express
 *or implied.
 */
	
	//Clear Variables and set to blank
	
	if(!ipskLoginSessionCheck()){
		$portalId = $_GET['portalId'];
		$_SESSION = null;
		session_destroy();
		header("Location: /index.php?portalId=".$portalId);
		die();
	}
	
	if(isset($sanitizedInput['action'])) {	
		if($sanitizedInput['action'] == "get_endpoint_groups"){
			if($iseERSIntegrationAvailable){
				print $ipskISEERS->getEndPointIdentityGroups();
			}					
		}elseif($sanitizedInput['action'] == "get_endpoint_count"){
			if($iseERSIntegrationAvailable){
				print $ipskISEERS->getEndPointGroupCountbyId($sanitizedInput['groupUuid']);
			}
		}
	}

?>