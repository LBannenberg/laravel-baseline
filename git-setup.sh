#!/bin/sh

# Clear out old hooks
find .git/hooks -type l -exec rm {} \;

# Symlink project-version-controlled hooks
find .githooks -type f -exec ln -sf ../../{} .git/hooks/ \;



# Background
# https://www.viget.com/articles/two-ways-to-share-git-hooks-with-your-team/
