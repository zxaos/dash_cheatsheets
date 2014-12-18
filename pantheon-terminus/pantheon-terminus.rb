cheatsheet do
  title 'Terminus'               # Will be displayed by Dash in the docset list
  docset_file_name 'pantheon-terminus'    # Used for the filename of the docset
  keyword 'terminus'             # Used as the initial search keyword (listed in Preferences > Docsets)
  # resources 'resources_dir'  # An optional resources folder which can contain images or anything else

  introduction 'Terminus, the CLI for Pantheon'  # Optional, can contain Markdown or HTML

  # A cheat sheet must consist of categories
  category do
    id 'unsorted'  # Must be unique and is used as title of the category
    entry do
      command 'pantheon-logout'
      command 'plogout'
      name 'Clear any stored session data.'
    end
    entry do
      command 'pantheon-auth'
      command 'pauth'
      name 'Authenticate against the Pantheon dashboard. Required before doing anything else.'
    end
    entry do
      command 'pantheon-sites'
      command 'psites'
      name 'List your Pantheon sites.'
    end
    entry do
      command 'pantheon-site-attributes'
      command 'psite-attr'
      name 'Get attributes for a particular site.'
    end
    entry do
      command 'pantheon-site-branch-list'
      command 'psite-blist'
      name 'List Git branches for a particular site.'
    end
    entry do
      command 'pantheon-site-branch-create'
      command 'psite-bcreate'
      name 'Create Git branch of master for a particular site.'
    end
    entry do
      command 'pantheon-site-branch-delete'
      command 'psite-bdel'
      name 'Delete a Git branch from a particular site.'
    end
    entry do
      command 'pantheon-hostname-add'
      command 'psite-hostname-add'
      command 'psite-ha'
      name 'Add a hostname to a site you control.'
    end
    entry do
      command 'pantheon-hostname-remove'
      command 'psite-hostname-remove'
      command 'psite-hr'
      name 'Remove a hostname from a site you control.'
    end
    entry do
      command 'pantheon-hostname-list'
      command 'psite-hostname-list'
      command 'psite-hl'
      name 'List all hostnames associated with a site.'
    end
    entry do
      command 'pantheon-products'
      command 'pproducts'
      name 'Get the list of available Drupal product start-states.'
    end
    entry do
      command 'pantheon-site-create'
      command 'psite-create'
      name 'Create a new site on Pantheon'
    end
    entry do
      command 'pantheon-site-import'
      command 'psite-import'
      name 'Import an existing site to Pantheon'
    end
    entry do
      command 'pantheon-site-delete'
      command 'psite-delete'
      name 'Delete a site from Pantheon.'
    end
    entry do
      command 'pantheon-site-backups'
      command 'psite-backups'
      name 'List site backups (and exports).'
    end
    entry do
      command 'pantheon-site-get-backup'
      command 'psite-get-backup'
      name 'Get a download link to a specific site backup.'
    end
    entry do
      command 'pantheon-site-make-backup'
      command 'psite-backup'
      name 'Trigger an on-demand backup for a site/environment.'
    end
    entry do
      command 'pantheon-site-download-backup'
      command 'psite-dl-backup'
      name 'Download a backup file from a specific site.'
    end
    entry do
      command 'pantheon-site-load-backup'
      command 'psite-load-backup'
      name 'Load db with a backup file from a specific site.'
    end
    entry do
      command 'pantheon-site-connection-mode'
      command 'psite-cmode'
      name 'Set or retrieve the connection mode of a specific site/environment.'
    end
    entry do
      command 'pantheon-site-commit'
      command 'psite-commit'
      name 'Commit changes in an on-server-dev environment.'
    end
    entry do
      command 'pantheon-site-diffstat'
      command 'psite-diffs'
      name 'Get a list of changes (diffstat) to be commited in a remote on-server-dev environment.'
    end
    entry do
      command 'pantheon-site-environment-list'
      command 'psite-elist'
      name 'Get a list of site environments.'
    end
    entry do
      command 'pantheon-site-environment-create'
      command 'psite-ecreate'
      name 'Create a new multidev site environment.'
    end
    entry do
      command 'pantheon-site-environment-delete'
      command 'psite-edelete'
      name 'Delete a multidev site environment.'
    end
    entry do
      command 'pantheon-site-environment-lock'
      command 'psite-elo'
      name 'Lock a site environment.'
    end
    entry do
      command 'pantheon-site-environment-unlock'
      command 'psite-eul'
      name 'Unlock a site environment.'
    end
    entry do
      command 'pantheon-site-environment-lock-info'
      command 'psite-eli'
      name 'Get information about whether a site environment is locked.'
    end
    entry do
      command 'pantheon-site-notifications'
      command 'psite-notifications'
      name 'Get a list of notifications for a site.'
    end
    entry do
      command 'pantheon-site-jobs'
      command 'psite-jobs'
      name 'Get a list of jobs for a site.'
    end
    entry do
      command 'pantheon-site-uuid'
      command 'psite-uuid'
      name 'Get the site UUID based on the name.'
    end
    entry do
      command 'pantheon-site-name'
      command 'psite-name'
      name 'Get the site name from UUID.'
    end
    entry do
      command 'pantheon-site-dashboard'
      command 'psite-dash'
      name 'Get the dashboard link for a site.'
    end
    entry do
      command 'pantheon-site-service-level'
      command 'psite-upgrade'
      name 'Update the service level for the site.'
    end
    entry do
      command 'pantheon-site-environment-redis-clear'
      command 'psite-erc'
      name 'Clear redis cache of a site environment.'
    end
    entry do
      command 'pantheon-site-team'
      command 'psite-team'
      name 'Get the team for a site.'
    end
    entry do
      command 'pantheon-site-team-add'
      command 'psite-team-add'
      name 'Add someone to the team for a site.'
    end
    entry do
      command 'pantheon-site-team-remove'
      command 'psite-team-remove'
      name 'Remove someone from the team for a site.'
    end
    entry do
      command 'pantheon-site-change-owner'
      command 'psite-change-owner'
      name 'Change the owner of a site.'
    end
    entry do
      command 'pantheon-organizations'
      command 'porgs'
      name 'List your organization affiliations.'
    end
    entry do
      command 'pantheon-organization-sites'
      command 'porg-sites'
      name 'List the sites for an organization. Org admins only.'
    end
    entry do
      command 'pantheon-organization-site-add'
      command 'porg-site-add'
      name 'Add a site to an organization. Org admins only.'
    end
    entry do
      command 'pantheon-organization-site-remove'
      command 'porg-site-remove'
      name 'Remove a site from an organization. Org admins only.'
    end
    entry do
      command 'pantheon-site-tunnels'
      command 'psite-tunnels'
      name 'Get a list of open tunnels.'
    end
    entry do
      command 'pantheon-site-tunnel'
      command 'psite-tunnel'
      name 'Opens a tunnel to a specific site/environment/service.'
    end
    entry do
      command 'pantheon-site-tunnel-close'
      command 'psite-tclose'
      name 'Closes the tunnel to a specific site/environment/service.'
    end
    entry do
      command 'pantheon-site-mount'
      command 'psite-mount'
      name 'Mounts an environment file system to a local directory.'
    end
    entry do
      command 'pantheon-site-clone'
      command 'psite-clone'
      name 'Clone content from one site environment to another.'
    end
    entry do
      command 'pantheon-site-deploy'
      command 'psite-deploy'
      name 'Deploy code to a particular environment.'
    end
    entry do
      command 'pantheon-site-upstream-info'
      command 'psite-upstream-info'
      name 'Get the upstream info for a site.'
    end
    entry do
      command 'pantheon-site-upstream-updates'
      command 'psite-upstream-updates'
      name 'Get available upstream update status for a site.'
    end
    entry do
      command 'pantheon-site-upstream-updates-apply'
      command 'psite-upstream-updates-apply'
      name 'Apply available upstream update status for a site.'
    end
    entry do
      command 'pantheon-site-environment-content-wipe'
      command 'psite-ewipe'
      name 'Wipe the content from a particular environment.'
    end
    entry do
      command 'pantheon-aliases'
      command 'paliases'
      name 'Update the Pantheon Drush alias file at ~/.drush/pantheon.aliases.drushrc.php.'
    end
    entry do
      command 'pantheon-site-info'
      command 'psite-info'
      name 'Get Pantheon metadata on a site'
    end
    entry do
      command 'pantheon-site-nr-info'
      command 'psite-nri'
      name 'Get New Relic metadata on a site'
    end
    entry do
      command 'pantheon-site-wake'
      command 'psite-wake'
      name 'Ensure a site environment is online and not suspended due to inactivity.'
    end
    entry do
      command 'pantheon-pp'
      command 'pp'
      name 'Direct pseudo-proxy interface. JSON only. For debugging.'
    end
  end

  category do
    id 'Examples'
    entry do
      name 'Code sample'
      notes <<-'END'
      ```ruby
      sample = "You can include code snippets as well"
      ```
      Or anything else **Markdown** or HTML.
      END
    end
  entry do
      command 'CMD+N'         # Optional
      command 'CMD+SHIFT+N'   # Multiple commands are supported
      name 'Create window'    # A short name, can contain Markdown or HTML
      notes 'Some notes'      # Optional longer explanation, can contain Markdown or HTML
    end
    entry do
      command 'CMD+W'
      name 'Close window'
    end
  end

  notes 'Some notes at the end of the cheat sheet'
end