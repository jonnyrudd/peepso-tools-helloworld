<?php

class PeepSoConfigSectionHelloworld extends PeepSoConfigSectionAbstract
{
	// Builds the groups array
	public function register_config_groups()
	{
		$this->context='left';
		$this->group_general();

		$this->context='right';
		$this->group_custom_greeting();
	}


	/**
	 * General Settings Box
	 */
	private function group_general()
	{
		// Add "options" parameter (array) to the next field
		$options = array(
			'left' => __('Left', 'peepso-hello-world'),
			'center' => __('Center', 'peepso-hello-world'),
			'right' => __('Right', 'peepso-hello-world'),
		);

		// args(key, value)
		$this->args('options', $options);

		// set_field() will take all previously set args and reset them after the field is rendered
		$this->set_field(
			'peepso_helloworld_align',
			__('Message alignment', 'peepso-hello-world'),
			'select'
		);

		// The next has to be a number
		$this->args('int', TRUE);
		$this->args('validation', array('required','numeric'));

		// If we didn't specify a default during plugin activation, we can do it now
		$this->args('default', 1);

		// Once again the args will be included automatically. Note that args set before previous field are gone
		$this->set_field(
			'peepso_helloworld_exclamation_marks',
			__('Number of exclamation marks', 'peepso-hello-world'),
			'text'
		);

		$this->set_group(
			'peepso_helloworld_general',
			__('General', 'peepso-hello-world')
		);
	}

	/**
	 * Custom Greeting Box
	 */
	private function group_custom_greeting()
	{
		// # Message Custom Greeting
		$this->set_field(
			'peepso_helloworld_use_custom_message',
			__('Switch this on to enable the custom greeting in the frontend','peepso-hello-world'),
			'message'
		);


		// # Use Custom Greeting
		$this->set_field(
			'peepso_helloworld_use_custom',
			__('Use Custom Greeting', 'peepso-hello-world'),
			'yesno_switch'
		);

		$this->set_field(
			'peepso_helloworld_custom_message',
			__('Custom Greeting', 'peepso-hello-world'),
			'text'
		);


		$this->set_group(
			'peepso_helloworld_custom_greeting',
			__('Customize Greeting Message', 'peepso-hello-world')
		);
	}
}