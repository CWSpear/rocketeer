<?php
/*
 * This file is part of Rocketeer
 *
 * (c) Maxime Fabre <ehtnam6@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Rocketeer\Abstracts\Strategies;

use Rocketeer\Bash;

/**
 * Core class for strategies
 *
 * @author Maxime Fabre <ehtnam6@gmail.com>
 */
abstract class AbstractStrategy extends Bash
{
	/**
	 * Whether this particular strategy is runnable or not
	 *
	 * @return boolean
	 */
	public function isExecutable()
	{
		return true;
	}

	//////////////////////////////////////////////////////////////////////
	////////////////////////////// HELPERS ///////////////////////////////
	//////////////////////////////////////////////////////////////////////

	/**
	 * Display what the command is and does
	 *
	 * @return $this
	 */
	public function displayStatus()
	{
		// Recompose strategy and implementation from
		// the class name
		$components = get_class($this);
		$components = explode('\\', $components);

		$name     = array_get($components, count($components) - 1);
		$strategy = array_get($components, count($components) - 2);

		$object  = 'Running strategy for '.ucfirst($strategy);
		$subject = str_replace('Strategy', null, $name);

		$this->explainer->display($object, $subject);

		return $this;
	}
}
