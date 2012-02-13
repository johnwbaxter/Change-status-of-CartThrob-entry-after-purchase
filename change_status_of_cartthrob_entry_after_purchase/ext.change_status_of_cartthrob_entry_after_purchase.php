<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_status_of_cartthrob_entry_after_purchase_ext
{
    public $settings = array();
    public $name = 'Update Entries To Open On Paid CT';
    public $version = '1.0.0';
    public $description = 'CartThrob Extension To Update Entries To Open On Paid';
    public $settings_exist = 'n';
    public $docs_url = 'http://cartthrob.com/';

    /**
     * construct
     *
     * @access    public
     * @param    mixed $settings = ''
     * @return    void
     */
    public function __construct($settings = '')
    {
        $this->EE =& get_instance();

        $this->settings = $settings;
    }

    /**
     * activate_extension
     * 
     * @access    public
     * @return    void
     */
    public function activate_extension()
    {
        $hook = array(
            'class' => __CLASS__,
            'settings' => '',
            'version' => $this->version,
            'enabled' => 'y',
            'priority' => 10,
            'method' => 'cartthrob_on_authorize',
            'hook' => 'cartthrob_on_authorize'
        );

        $this->EE->db->insert('extensions', $hook);
    }
	

    /**
     * update_extension
     * 
     * @access    public
     * @param    mixed $current = ''
     * @return    void
     */
    public function update_extension($current = '')
    {
        if ($current == '' OR $current == $this->version)
        {
            return FALSE;
        }

        $this->EE->db->update('extensions', array('version' => $this->version), array('class' => __CLASS__));
    }

    /**
     * disable_extension
     * 
     * @access    public
     * @return    void
     */
    public function disable_extension()
    {
        $this->EE->db->delete('extensions', array('class' => __CLASS__));
    }

    /**
     * settings
     * 
     * @access    public
     * @return    void
     */
    public function settings()
    {
        $settings = array();

        return $settings;
    }

        /**
         *cartthrob_on_authorize
         *
         * @access    public
         * @return    void
         */
    function cartthrob_on_authorize()
	{

    	foreach ($this->EE->cartthrob->cart->order('items') as $item)
    	{
        	$this->EE->db->update('channel_titles', array('status' => 'Open'), array('entry_id' => $item->product_id()));
    	}

        //var_dump($this->EE->cartthrob->order->order());
	}

    // @TODO Need to implement a Extension settings interface to allow category selection rather than being hardcoded here.

}

/* End of file ext.change_status_of_cartthrob_entry_after_purchase.php */
/* Location: ./system/expressionengine/third_party/change_status_of_cartthrob_entry_after_purchase/ext.change_status_of_cartthrob_entry_after_purchase.php */