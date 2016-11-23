<?php
    require_once '../../config.php';

    function domainExist($fqdn) {
        $domainsActions = $GLOBALS['digitalocean']->domain();

        if (isset($fqdn)) {
            $domains = $domainsActions->getAll();

            foreach ($domains as $domain) {
                if ($fqdn == $domain->name) {
                    return true;
                }
            }
        }

        return false;
    }

    function domainHasRecord($fqdn, $record) {
        $domainsRecordsActions = $GLOBALS['digitalocean']->domainRecord();

        if (isset($fqdn) && isset($record)) {
            if (domainExist($fqdn)) {
                $domain_records = $domainsRecordsActions->getAll($fqdn);

                foreach ($domain_records as $domain_record) {
                    if ($domain_record->type === $record) {
                        return $domain_record->id;
                    }
                }
            }
        }

        return false;
    }