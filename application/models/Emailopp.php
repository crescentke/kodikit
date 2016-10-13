<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Emailopp extends CI_Model {

    function template($mess_one) {
        $message1 = '<div style="background: #f6f6f6;padding: 20px;">
                <div style="max-width: 460px; margin: 0 auto;">
                <p style="font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #2f353f; margin: 0; padding: 20px;" bgcolor="#2f353f" valign="top" align="center">
							Welcome to Kodikit!
						</p>
               <div style="background: #fff;border: 1px solid rgb(233, 233, 233);border-radius:3px; font-size: 14px; padding: 20px;">
                <p style="font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										Please confirm your email address by clicking the link below.
									</p>
									
									 <p style="font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										We may need to send you critical information about your property and it is important that we have an accurate email address. 
									</p>
									
									<div style="padding-top: 20px;">
                <a href="'.  base_url()."confirm?u=".base64_encode($mess_one).'" style="font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #3bafda; margin: 0; border-color: #3bafda; border-style: solid; border-width: 10px 20px;">Confirm email address</a>
                </div>
                
                <p style="font-size: 14px; vertical-align: top; margin: 0; padding: 20px 0 20px;" valign="top">
										 Thanks for choosing KodiKit
									</p>
               </div>
                </div>
                
                
                </div>';
        return $message1;
    }

    function send_mail($uremail) {

        $message = $this->template($uremail);

        $this->email->from('info@example.com', 'KodiKit');
        $this->email->to($uremail);
        $this->email->subject('Welcome to Kodikit');
        $this->email->message($message);

        $s = $this->email->send();

        if ($s) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function addteam_temp($mail, $pass) {
        $message1 = '<div style="background: #f6f6f6;padding: 20px;">
                <div style="max-width: 460px; margin: 0 auto;">
                <p style="font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #2f353f; margin: 0; padding: 20px;" bgcolor="#2f353f" valign="top" align="center">
							Welcome to Kodikit!
						</p>
               <div style="background: #fff;border: 1px solid rgb(233, 233, 233);border-radius:3px; font-size: 14px; padding: 20px;">
                <p style="font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                You have been registered on Kodikit.
                </p>

                <p style="font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                    Use the login credintials below to access your account:-<br/><br/><br/>
                    <strong>Email: '.$mail.'</strong><br/>
                    <strong>Password: '.$pass.'</strong>
                </p>
                
                <p style="font-size: 14px; vertical-align: top; margin: 0; padding: 20px 0 20px;" valign="top">
										 Thanks for choosing KodiKit
									</p>
               </div>
                </div>
                
                
                </div>';
        return $message1;
    }
    
    function send_teamadd_mail($uremail, $password) {

        $message = $this->addteam_temp($uremail, $password);

        $this->email->from('admin@example.com', 'KodiKit');
        $this->email->to($uremail);
        $this->email->subject('Welcome to Kodikit');
        $this->email->message($message);

        $s = $this->email->send();

        if ($s) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
