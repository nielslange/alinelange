<?php
/**
 * Email Footer
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
															</div>
														</td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- Footer -->
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
                                    	<tr>
                                        	<td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td colspan="2" valign="middle" id="credit">
                                                        	<br/>

                                                        	<p>aline lange FOTOGRAFIE<br/>
                                                        	Aline Lange<br/>
                                                            Goethestr. 45<br/>
															D - 69242 Mühlhausen</p>
 
															<p>Tel.: +49 (0) 6222 63021<br/>
															Email: aline@alinelange.de<br/> 
															Web: www.alinelange.de</p>
 
															<p>***************************<br/>
															aline lange FOTOGRAFIE<br/>
															Mitglied der Handwerkskammer Mannheim<br>
                                                            Betriebsnummer: 56160<br/>
															Steuer-Nr.: DE - 275498854<br/>
															***************************</p>
	
                                                            <?php
                                                            printf('<p>Unsere Allgemeinen Geschäftsbedingungen finden Sie unter: <br><a href="%1$s">%1$s</a></p>', esc_url( get_permalink(get_page_by_title('Allgemeine Geschäftsbedingungen')) ));
                                                            printf('<p>Unsere Datenschutzhinweise finden Sie unter:<br><a href="%1$s">%1$s</a></p>', esc_url( get_permalink(get_page_by_title('Datenschutzhinweise')) ));
                                                            printf('<p>Unsere Wiederufsbelehrung finden Sie unter:<br><a href="%1$s">%1$s</a></p>', esc_url( get_permalink(get_page_by_title('Wiederufsbelehrung')) ));
                                                            printf('<p>Unsere Wiederufsbelehrung für digitale Inhalte finden Sie unter:<br><a href="%1$s">%1$s</a></p>', esc_url( get_permalink(get_page_by_title('Wiederufsbelehrung für digitale Inhalte')) ));
                                                            ?>
                                                            
															<p>Diese E-Mail einschließlich aller Anhänge ist immer vertraulich. Wir bitten eine fehlgeleitete E-Mail unverzüglich und vollständig zu löschen und uns eine Nachricht hinsichtlich der fehlgeleiteten E-Mail zukommen zu lassen. Eine Haftung für Virenfreiheit schließen wir aus.</p>
															<p>This email and all attachments are always confidential. If you are not the intended recipient of this email, please delete it immediately and completely and inform us accordingly about the misrouted email. We are not liable for any virus contamination.</p>
                                                            
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
