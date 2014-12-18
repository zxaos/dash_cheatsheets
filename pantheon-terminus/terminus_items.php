<?php

function dt($string){return $string;}

function terminus_drush_command() {
  $items = array();

  $items['pantheon-logout'] = array(
    'description' => "Clear any stored session data.",
    'examples' => array(
      'drush plogout',
    ),
    'aliases' => array('plogout'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-auth'] = array(
    'description' => "Authenticate against the Pantheon dashboard. Required before doing anything else.",
    'arguments' => array(
      'email' => 'Email address of dashboard account',
    ),
    'options' => array(
      'password' => array(
        'description' => 'Optional: include password for script-friendly use.',
        'example-value' => 'mypassword',
      ),
    ),
    'examples' => array(
      'drush pauth josh@getpantheon.com --password=mypassword' => 'Get authentication token.',
    ),
    'aliases' => array('pauth'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-sites'] = array(
    'description' => 'List your Pantheon sites.',
    'examples' => array(
      'drush psites --nocache' => 'Get a fresh list of sites.',
    ),
    'aliases' => array('psites'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-attributes'] = array(
    'description' => 'Get attributes for a particular site.',
    'aliases' => array('psite-attr'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
    'arguments' => array(
      'site' => 'The site UUID in question.',
    ),
    'options' => array(
      'attribute' => array(
        'description' => 'Specific attribute that you want to get.',
        'example-value' => 'label',
      ),
    ),
  );

  $items['pantheon-site-branch-list'] = array(
    'description' => 'List Git branches for a particular site.',
    'aliases' => array('psite-blist'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
    'arguments' => array(
      'site' => 'The site UUID in question.',
    ),
  );

  $items['pantheon-site-branch-create'] = array(
    'description' => 'Create Git branch of master for a particular site.',
    'aliases' => array('psite-bcreate'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
    'arguments' => array(
      'site' => 'The site UUID in question.',
    ),
    'options' => array(
      'name' => array(
        'description' => 'Branch name to be created.',
        'example-value' => 'feature-123',
      ),
    ),
  );

  $items['pantheon-site-branch-delete'] = array(
    'description' => 'Delete a Git branch from a particular site.',
    'aliases' => array('psite-bdel'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
    'arguments' => array(
      'site' => 'The site UUID in question.',
    ),
    'options' => array(
      'name' => array(
        'description' => 'Branch name to be deleted.',
        'example-value' => 'feature-123',
      ),
    ),
  );

  $items['pantheon-hostname-add'] = array(
    'description' => "Add a hostname to a site you control.",
    'arguments' => array(
      'site' => 'The site UUID you are working on.',
      'environment' => 'The environment (e.g. "live").',
      'hostname' => 'The hostname (e.g. "www.mysite.com")',
    ),
    'aliases' => array('psite-hostname-add', 'psite-ha'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-hostname-remove'] = array(
    'description' => "Remove a hostname from a site you control.",
    'arguments' => array(
      'site' => 'The site UUID you are working on.',
      'environment' => 'The environemnt (e.g. "live").',
      'hostname' => 'The hostname (e.g. "www.mysite.com")',
    ),
    'aliases' => array('psite-hostname-remove', 'psite-hr'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-hostname-list'] = array(
    'description' => dt('List all hostnames associated with a site.'),
    'arguments' => array(
      'site' => 'The site UUID you are working on.',
      'environment' => 'The environemnt (e.g. "live").',
    ),
    'aliases' => array('psite-hostname-list', 'psite-hl'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-products'] = array(
    'description' => "Get the list of available Drupal product start-states.",
    'aliases' => array('pproducts'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-create'] = array(
    'description' => "Create a new site on Pantheon",
    'arguments' => array(
      'name' => 'Short name of the site to create. Will be part of the URL.',
    ),
    'options' => array(
      'label' => array(
        'description' => 'Human-friendly site label.',
      ),
      'product' => array(
        'description' => 'UUID of the product you want to start with (see pantheon-products).',
      ),
      'organization' => array(
        'description' => 'UUID of an organization you want the site to be a part of.',
      ),
      'nopoll' => array(
        'description' => 'Do not hang around and wait for the site to be ready. Useful for scripting a lot of spin-ups.',
      ),
    ),
    'aliases' => array('psite-create'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-import'] = array(
    'description' => "Import an existing site to Pantheon",
    'arguments' => array(
      'name' => 'Short name of the site to create. Will be part of the URL.',
      'url' => 'URL of Drush Archive.',
    ),
    'options' => array(
      'label' => array(
        'description' => 'Human-friendly site label.',
      ),
      'organization' => array(
        'description' => 'UUID of an organization you want the site to be a part of.',
      ),
      'nopoll' => array(
        'description' => 'Do not hang around and wait for the site to be ready. Useful for scripting a lot of spin-ups.',
      ),
    ),
    'aliases' => array('psite-import'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-delete'] = array(
    'description' => "Delete a site from Pantheon.",
    'arguments' => array(
      'site' => 'UUID of the site you want to delete.',
    ),
    'aliases' => array('psite-delete'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-backups'] = array(
    'description' => "List site backups (and exports).",
    'arguments' => array(
      'site' => 'UUID of the site you want to get backups for.',
      'environment' => 'The environment (e.g. "live") you want to back up.',
    ),
    'aliases' => array('psite-backups'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-get-backup'] = array(
    'description' => "Get a download link to a specific site backup.",
    'arguments' => array(
      'site' => 'UUID of the site you want to get backups for.',
      'environment' => 'The environment (e.g. "live") you want to back up.',
      'bucket' => 'Bucket for the backup.',
      'element' => 'Which part of the backup do you want?',
    ),
    'aliases' => array('psite-get-backup'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-make-backup'] = array(
    'description' => "Trigger an on-demand backup for a site/environment.",
    'arguments' => array(
      'site' => 'UUID of the site you want to make a backup for.',
      'environment' => 'The environment (e.g. "live") you want to back up.',
    ),
    'aliases' => array('psite-backup'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-download-backup'] = array(
    'description' => "Download a backup file from a specific site.",
    'arguments' => array(
      'site' => 'UUID of the site you want to get backups for.',
      'environment' => 'The environment (e.g. "live") you want to download a backup from.',
      'bucket' => 'Bucket for the backup. Use "latest" for the most recent.',
      'element' => 'Which part of the backup do you want? (e.g. database, files, code)',
      'destination' => 'Where would you like the backup?'
    ),
    'aliases' => array('psite-dl-backup'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-load-backup'] = array(
    'description' => "Load db with a backup file from a specific site.",
    'arguments' => array(
      'site' => 'UUID or name of the site you want to get backups for.',
      'environment' => 'The environment (e.g. "live") you want to use a backup from.',
      'bucket' => 'Bucket for the backup. Use "latest" for the most recent.',
    ),
    'aliases' => array('psite-load-backup'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-connection-mode'] = array(
    'description' => "Set or retrieve the connection mode of a specific site/environment.",
    'arguments' => array(
      'site' => 'UUID or name of the site.',
      'environment' => 'The dev or multidev environment you would like to target.',
      'mode' => 'Connection mode like to set (e.g., "sftp" or "git"). Leave blank to retrieve the current mode.',
    ),
    'aliases' => array('psite-cmode'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-commit'] = array(
    'description' => 'Commit changes in an on-server-dev environment.',
    'arguments' => array(
      'site' => 'UUID or name of the site.',
      'environment' => 'Environment to commit: a dev or multidev environment',
    ),
    'options' => array(
      'message' => 'Commit message',
    ),
    'aliases' => array('psite-commit'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-diffstat'] = array(
    'description' => 'Get a list of changes (diffstat) to be commited in a remote on-server-dev environment.',
    'arguments' => array(
      'site' => 'UUID or name of the site.',
      'environment' => 'Environment to commit: a dev or multidev environment',
    ),
    'aliases' => array('psite-diffs'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-environment-list'] = array(
    'description' => 'Get a list of site environments.',
    'arguments' => array(
      'site' => 'UUID or name of the site.',
    ),
    'aliases' => array('psite-elist'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-environment-create'] = array(
    'description' => 'Create a new multidev site environment.',
    'arguments' => array(
      'site' => 'UUID or name of the site.',
      'environment' => 'Name of multidev site environment. If branch does not exist, it will be created.',
    ),
    'options' => array(
      'source' => 'The source environment (e.g. "live") from which content will be cloned. If omitted, will default to dev.',
    ),
    'aliases' => array('psite-ecreate'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-environment-delete'] = array(
    'description' => 'Delete a multidev site environment.',
    'arguments' => array(
      'site' => 'UUID or name of the site.',
      'environment' => 'Name of multidev site environment.',
    ),
    'aliases' => array('psite-edelete'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-environment-lock'] = array(
    'description' => dt('Lock a site environment.'),
    'arguments' => array(
      'site' => dt('UUID or name of the site.'),
      'environment' => dt('Name of site environment.'),
      'username' => dt('Username for HTTP Basic Auth'),
      'password' => dt('Password for HTTP Basic Auth'),
    ),
    'aliases' => array('psite-elo'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-environment-unlock'] = array(
    'description' => dt('Unlock a site environment.'),
    'arguments' => array(
      'site' => dt('UUID or name of the site.'),
      'environment' => dt('Name of site environment.'),
    ),
    'aliases' => array('psite-eul'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-environment-lock-info'] = array(
    'description' => dt('Get information about whether a site environment is locked.'),
    'arguments' => array(
      'site' => dt('UUID or name of the site.'),
      'environment' => dt('Name of site environment.'),
    ),
    'aliases' => array('psite-eli'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-notifications'] = array(
    'description' => dt('Get a list of notifications for a site.'),
    'arguments' => array(
      'site' => dt('UUID of the site.'),
    ),
    'options' => array(
      'count' => dt('Number of notifications to show'),
      'type' => dt('Filter notifications by type'),
    ),
    'aliases' => array('psite-notifications'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-jobs'] = array(
    'description' => dt('Get a list of jobs for a site.'),
    'arguments' => array(
      'site' => dt('UUID of the site.'),
    ),
    'options' => array(
      'environment' => array(
        'description' => dt('Filter jobs by environment'),
        'example-value' => 'dev',
      ),
      'slot' => array(
        'description' => dt('Filter by slot'),
        'example-value' => 'cache_clear',
      ),
    ),
    'aliases' => array('psite-jobs'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-uuid'] = array(
    'description' => "Get the site UUID based on the name.",
    'arguments' => array(
      'sites' => 'A list of site names.',
    ),
    'examples' => array(
      'drush psite-uuid mysite --nocache' => 'Get the UUID of your site.',
    ),
    'options' => array(
      'compact' => 'Output only uuid. Useful for scripting.',
    ),
    'required-arguments' => TRUE,
    'aliases' => array('psite-uuid'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-name'] = array(
    'description' => dt('Get the site name from UUID.'),
    'arguments' => array(
      'uuid' => dt('UUID of the site.'),
    ),
    'examples' => array(
      'drush psite-name 12345678-1234-abcd-9876-fedcba09 --nocache' => dt('Get the name of your site.'),
    ),
    'required-arguments' => TRUE,
    'aliases' => array('psite-name'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-dashboard'] = array(
    'description' => "Get the dashboard link for a site.",
    'arguments' => array(
      'site' => 'UUID of the site.',
    ),
    'examples' => array(
      'drush psite-dash mysite -y' => 'Open the dashboard for a site.',
    ),
    'aliases' => array('psite-dash'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-service-level'] = array(
    'description' => "Update the service level for the site.",
    'arguments' => array(
      'site' => 'UUID of the site.',
      'service-level' => 'Service level to upgrade to.',
    ),
    'examples' => array(
      'drush psite-upgrade <site> <service-level>' => 'Open the dashboard for a site.',
    ),
    'aliases' => array('psite-upgrade'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-environment-redis-clear'] = array(
    'description' => 'Clear redis cache of a site environment.',
    'arguments' => array(
      'site' => 'UUID or name of the site.',
      'environment' => 'Name of site environment.',
    ),
    'aliases' => array('psite-erc'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  /**
   * Site team functions.
   */
  $items['pantheon-site-team'] = array(
    'description' => "Get the team for a site.",
    'arguments' => array(
      'site' => 'uuid of the site',
    ),
    'examples' => array(
      'drush psite-team 12345678-1234-abcd-9876-fedcba09 --nocache' => 'Get the team of your site.',
    ),
    'aliases' => array('psite-team'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-team-add'] = array(
    'description' => "Add someone to the team for a site.",
    'arguments' => array(
      'site' => 'uuid of the site',
      'user' => 'user you would like to make a part of the team: uuid or email',
    ),
    'examples' => array(
      'drush psite-team-add mysite josh@getpantheon.com' => 'Add josh to your site team.',
    ),
    'aliases' => array('psite-team-add'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-team-remove'] = array(
    'description' => "Remove someone from the team for a site.",
    'arguments' => array(
      'site' => 'uuid of the site',
      'user' => 'user you would like to remove: uuid or email',
    ),
    'examples' => array(
      'drush psite-team-remove mysite josh@getpantheon.com' => 'Remove josh to your site team.',
    ),
    'aliases' => array('psite-team-remove'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-change-owner'] = array(
    'description' => "Change the owner of a site.",
    'arguments' => array(
      'site' => 'uuid of the site',
      'user' => 'team member you would like to make the new owner: uuid or email',
    ),
    'examples' => array(
      'drush psite-set-owner mysite josh@getpantheon.com' => 'Make josh the site owner.',
    ),
    'aliases' => array('psite-change-owner'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  /**
   * Organization-scope functions.
   */
  $items['pantheon-organizations'] = array(
    'description' => "List your organization affiliations.",
    'examples' => array(
      'drush porgs --nocache' => 'Get a fresh list of sites.',
    ),
    'aliases' => array('porgs'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-organization-sites'] = array(
    'description' => "List the sites for an organization. Org admins only.",
    'arguments' => array(
      'organization' => 'UUID of the organization you want to use.',
    ),
    'examples' => array(
      'drush porg-sites' => 'Get a fresh list of sites.',
    ),
    'aliases' => array('porg-sites'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-organization-site-add'] = array(
    'description' => "Add a site to an organization. Org admins only.",
    'arguments' => array(
      'organization' => 'UUID of the organization.',
      'site' => 'UUID of the organization.',
    ),
    'examples' => array(
      'drush porg-site-add <org> <site>' => 'Add a site to an organization.',
    ),
    'aliases' => array('porg-site-add'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-organization-site-remove'] = array(
    'description' => "Remove a site from an organization. Org admins only.",
    'arguments' => array(
      'organization' => 'UUID of the organization.',
      'site' => 'UUID of the organization.',
    ),
    'examples' => array(
      'drush porg-site-remove <org> <site>' => 'Add a site to an organization.',
    ),
    'aliases' => array('porg-site-remove'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  /**
   * Tunnel Functions.
   */
  $items['pantheon-site-tunnels'] = array(
    'description' => "Get a list of open tunnels.",
    'aliases' => array('psite-tunnels'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-tunnel'] = array(
    'description' => "Opens a tunnel to a specific site/environment/service.",
    'arguments' => array(
      'site' => 'UUID or name of the site.',
      'environment' => 'The target environment (e.g. "live").',
      'service' => 'The service (e.g., "mysql" or "redis") to open a tunnel for. Defaults to "mysql".',
      'port' => 'Local port to connect to.',
    ),
    'aliases' => array('psite-tunnel'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-tunnel-close'] = array(
    'description' => "Closes the tunnel to a specific site/environment/service.",
    'arguments' => array(
      'site' => 'UUID or name of the site. If left empty, all tunnels will be closed.',
      'environment' => 'The target environment (e.g. "live"). If left empty, all site tunnels will be closed.',
      'service' => 'The service (e.g., "mysql" or "redis") to open a tunnel for. If empty, all site/environment tunnels will be closed.'
    ),
    'aliases' => array('psite-tclose'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-mount'] = array(
    'description' => "Mounts an environment file system to a local directory.",
    'arguments' => array(
      'site' => 'UUID or name of the site. If left empty, all tunnels will be closed.',
      'environment' => 'The target environment (e.g. "live"). If left empty, all site tunnels will be closed.',
      'destination' => 'Where would you like to mount the file system?'
    ),
    'aliases' => array('psite-mount'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  /**
   * Workflow.
   */
  $items['pantheon-site-clone'] = array(
    'description' => 'Clone content from one site environment to another.',
    'arguments' => array(
      'site' => 'UUID of the site containing content.',
      'source' => 'The source environment (e.g. "live") from which content will be cloned.',
      'target' => 'The target environment (e.g. "live") to which content will be cloned.',
    ),
    'options' => array(
      'db' => 'Clone database content.',
      'files' => 'Clone files content.',
      'update' => 'Run update.php after cloning database.',
    ),
    'examples' => array(
      'drush psite-clone SITE_UUID dev test' => 'Clone both database and files from dev to test.',
      'drush psite-clone SITE_UUID dev test --db --update' => 'Clone only database from dev to test, then run update.php.',
      'drush psite-clone SITE_UUID dev test --files' => 'Clone only user files from dev to test.',
    ),
    'aliases' => array('psite-clone'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-deploy'] = array(
    'description' => 'Deploy code to a particular environment.',
    'arguments' => array(
      'site' => 'UUID of the site.',
      'target' => 'The target environment (e.g. "live") to which code will be deployed.',
    ),
    'options' => array(
      'update' => 'Run update.php after deploying code.',
      'cc' => 'Clear cache after deploying code.',
    ),
    'examples' => array(
      'drush psite-deploy SITE_UUID live' => 'Deploy latest code changes to live.',
      'drush psite-deploy SITE_UUID test --update --cc' => 'Deploy latest code changes to test, the run update.php and clear cache.',
    ),
    'aliases' => array('psite-deploy'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-upstream-info'] = array(
    'description' => 'Get the upstream info for a site.',
    'arguments' => array(
      'site' => 'UUID of the site.',
    ),
    'examples' => array(
      'drush psite-upstream-info SITE_UUID' => 'See if there are upstream udpates available.',
    ),
    'aliases' => array('psite-upstream-info'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-upstream-updates'] = array(
    'description' => 'Get available upstream update status for a site.',
    'arguments' => array(
      'site' => 'UUID of the site.',
    ),
    'examples' => array(
      'drush psite-upstream-updates SITE_UUID' => 'See if there are upstream udpates available.',
    ),
    'aliases' => array('psite-upstream-updates'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-upstream-updates-apply'] = array(
    'description' => 'Apply available upstream update status for a site.',
    'arguments' => array(
      'site' => 'UUID of the site.',
    ),
    'options' => array(
      'overwrite' => 'Allow upstream changes to overwrite if there are conflicts.',
      'updatedb' => 'Run a "drush updatedb" after deploying code.',
    ),
    'examples' => array(
      'drush psite-upstream-updates-apply SITE_UUID --overwrite --updatedb' => 'Apply available upstream updates .',
    ),
    'aliases' => array('psite-upstream-updates-apply'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-environment-content-wipe'] = array(
    'description' => 'Wipe the content from a particular environment.',
    'arguments' => array(
      'site' => 'UUID of the site.',
      'environment' => 'The target environment (e.g. "live") to which code will be deployed.',
    ),
    'examples' => array(
    'drush psite-ewipe SITE_UUID dev' => 'Wipe the database and files from the dev environment.',
    ),
    'aliases' => array('psite-ewipe'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  /**
   * Utility Functions.
   */
  $items['pantheon-aliases'] = array(
    'description' => "Update the Pantheon Drush alias file at ~/.drush/pantheon.aliases.drushrc.php.",
    'options' => array(
      'destination' => array(
        'description' => 'Specify the destination to save the alias file.',
      ),
    ),
    'aliases' => array('paliases'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  $items['pantheon-site-info'] = array(
    'description' => dt('Get Pantheon metadata on a site'),
    'aliases' => array('psite-info'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
    'arguments' => array(
      'site' => dt('UUID or name of the site.'),
    ),
    'options' => array(
      'json' => array(
        'description' => dt('If set, will output in JSON format.'),
      ),
    ),
  );

  $items['pantheon-site-nr-info'] = array(
    'description' => dt('Get New Relic metadata on a site'),
    'aliases' => array('psite-nri'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
    'arguments' => array(
      'site' => dt('UUID or name of the site.'),
    ),
    'options' => array(
      'json' => array(
        'description' => dt('If set, will output in JSON format.'),
      ),
    ),
  );

  $items['pantheon-site-wake'] = array(
    'description' => 'Ensure a site environment is online and not suspended due to inactivity.',
    'aliases' => array('psite-wake'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
    'arguments' => array(
      'site' => 'UUID or name of the site.',
      'environment' => 'The target environment (e.g. "live").',
    ),
  );

  $items['pantheon-pp'] = array(
    'description' => "Direct pseudo-proxy interface. JSON only. For debugging.",
    'arguments' => array(
      'realm' => 'Are you asking about users or sites?',
      'uuid' => 'The unique id of the thing you want to know about.',
      'path' => 'Optional: path extension for more specific commands.',
    ),
    'aliases' => array('pp'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
  );

  // Include standard options for all commands:
  $common = array(
    'nocache' => array(
      'description' => 'Force a refresh of cached authentication session.',
    ),
    'json' => array('description' => 'Return raw JSON if possible.'),
    'onebox' => array('description' => 'Use onebox (Pantheon dev only).'),
  );

  foreach ($items as $key => $array) {
    if (isset($array['options'])) {
      $items[$key]['options'] = array_merge($items[$key]['options'], $common);
    }
    else {
      $items[$key]['options'] = $common;
    }
  }

  return $items;
}

$commands = terminus_drush_command();

foreach ($commands as $command => $details){
  echo "entry do\n";
  echo "  command '" . $command . "'\n";
  foreach ($details['aliases'] as $alias){
    echo "  command '" . $alias . "'\n";
  }
  echo "  name '" . $details['description'] . "'\n";
  echo "end\n";
}