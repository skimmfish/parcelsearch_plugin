<form action='options.php' method='POST'>
<?php settings_fields( 'parcel_search_settings' ); ?>
<?php do_settings_sections( 'parcel_search_settings' ); ?>

						<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
							<label>SandBox or Live (Production)</label>
								<select name='lpss_app_mode' style='height:45px;'>
									<option value='<?php echo get_option('lpss_app_mode');?>' selected><?php echo ucfirst(get_option('lpss_app_mode'));?></option>
										<option value='sandbox'>Sandbox</option>
										<option value='production'>Live (Production)</option>
											</select>
												</div>
							

						<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;'>
						<div><label>X-Okapi-Key API Key</label></div>
							<div><input type='text' min='36' name='lpss_x-okapi-key' placeholder='X-Okapi-Key API Key Here, if you chose sandbox above, use sandbox api key instead and vice-versa' 
							class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_x-okapi-key');?>"  />
							</div>
								</div>
							
								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<label>Select your language preference</label>
								<select name='lpss_locale' style='height:45px;'>
								<option value='<?php echo get_option('lpss_locale');?>'><?php echo get_option('lpss_locale');?></option>
								<option value='en_GB'>en_GB</option>
								<option value='en_US'>en_US</option>
								<option value='fr_FR'>fr_Fr</option>
								</select>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Tracking Fees Amount</label></div>
								<div><input type='number' min="2" name='lpss_tracking_fee' placeholder='Tracking Fee' class='form-control input-lg'
								 style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_tracking_fee');?>" />
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Parcel Found Page</label></div>
								<div><input type='url' name='lpss_parcel-found-page' placeholder='Parcel Found Page' 
								class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_parcel-found-page');?>" />
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Parcel Not Found Page</label></div>
								<div><input type='url' name='lpss_parcel-not-found-page' placeholder='Parcel Not Found Page' class='form-control input-lg' 
								style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_parcel-not-found-page');?>" />
								</div>
								</div>


								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Tracking Information Page ID</label></div>
								<div><input type='number' name='lpss_tracking-info-pageid' placeholder='Tracking Information Page ID' class='form-control input-lg' 
								style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_tracking-info-pageid');?>" />
								</div>
								</div>

								<b>Payment processor settings</b><br/><br/>
								<b>All your settings on this page must be of <u><?php echo strtoupper(get_option('lpss_app_mode'));?></u> mode</b><Br/><br/>
								

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal Action URL <small>(For sandbox - <b>https://www.sandbox.paypal.com/cgi-bin/webscr</b>, & for production - <b>https://www.paypal.com/cgi-bin/webscr )</b></small></label></div>
								<div><input type='text' min='36' name='lpss_paypal_action_url' placeholder='Paypal Action Url' 
							class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal_action_url');?>"  />
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal Client ID</label></div>
								<div><input type='text' min='36' name='lpss_paypal_client_id' placeholder='Paypal Client ID' 
							class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal_client_id');?>"  />
								</div>
								</div>


								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal Business E-mail</label></div>
								<div><input type='text' min='36' name='lpss_paypal-business-email' placeholder='Paypal Business E-mail Address' 
							class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal-business-email');?>"  />
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal Secret ID</label></div>
								<div><input type='text' min='36' name='lpss_paypal_secret_id' placeholder='Paypal Secret ID' 
							class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal_secret_id');?>" />
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal App ID</label></div>
								<div><input type='text' min='36' name='lpss_paypal_app_id' placeholder='Paypal App ID' 
								class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal_app_id');?>"  />
								</div>
								</div>
								
								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal  Return / Notify URL</label></div>
								<div><input type='text' min='36' name='lpss_paypal-notify-url' placeholder='Paypal Notify/Return Url' 
								class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal-notify-url');?>"  />
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal  Cancel URL</label></div>
								<div><input type='text' min='36' name='lpss_paypal-cancel-url' placeholder='Paypal Cancel URL' 
								class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal-cancel-url');?>"  />
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal Currency</label></div>
								<div>
							
<select name="lpss_payment_currency" class="form-control">
<option selected name="<?php echo get_option('lpss_payment_currency');?>"><?php echo get_option('lpss_payment_currency');?></option>
<option>USD</option>
<option>GBP</option>
<option>CAD</option>
<option>EUR</option>
</select>
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal API Username</label></div>
								<div><input type='text' min='36' name='lpss_paypal-username' placeholder='Paypal Username' 
								class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal-username');?>"/>
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal API Password</label></div>
								<div><input type='password' min='36' name='lpss_paypal-password' placeholder='Paypal Password' 
								class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal-password');?>"  />
								</div>
								</div>

								<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
								<div><label>Paypal API Signature</label></div>
								<div><input type='text' min='36' name='lpss_paypal-signature' placeholder='Paypal API Signature' 
								class='form-control input-lg' style='width:46.5%;font-size:12px;height:45px;'  value ="<?php echo get_option('lpss_paypal-signature');?>"  />
								</div>
								</div>
								
								
					<div class='form-group' style='display:grid;grid-template-columns:25% 75%;grid-gap:5px;margin-bottom:15px;font-size:12px;'>
					<div></div>
					<div>
						<input type='submit' id='submit' name='submit'  value='Save Settings' class='btn btn-primary' style='cursor:pointer;background:#FF4500;color:#fff;font-size:11px;padding-left:19px;padding-right:19px;border:0;border-radius:6px;height:45px;' /> </div>
						</div>
				</form>
						
		