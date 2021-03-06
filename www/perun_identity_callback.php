<?php

use SimpleSAML\Module\perun\Auth\Process\PerunIdentity;
use SimpleSAML\Auth\State;
use SimpleSAML\Auth\ProcessingChain;

/**
 * See sspmod_perun_Auth_Process_PerunIdentity for mor information.
 *
 * @author Ondrej Velisek <ondrejvelisek@gmail.com>
 */

$state = State::loadState($_REQUEST['stateId'], 'perun:PerunIdentity');

$perunIdentity = new PerunIdentity($state['config'], null);

// If this return it means it successfully get and fill perun identity.
$perunIdentity->process($state);

ProcessingChain::resumeProcessing($state);
