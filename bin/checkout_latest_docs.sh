#!/bin/bash

DOCS_VERSIONS=(
  3.0
  2.7
  2.6
)

for v in "${DOCS_VERSIONS[@]}"; do
    if [ -d "src/pages/docs/$v" ]; then
        echo "Pulling latest documentation updates for $v..."
        (cd src/pages/docs/$v && git reset HEAD --hard && git pull)
    else
        echo "Cloning $v..."
        git clone --single-branch --branch "$v" git@github.com:anodyne/docs.git "src/pages/docs/$v"
    fi;

    if [ -d "public/images/docs/$v" ]; then
        echo "Removing images for $v..."
        (rm -r public/images/docs/$v)
    fi;

    if [ -d "src/pages/docs/$v/images" ]; then
        echo "Moving images for $v..."
        (mkdir public/images/docs/$v)
        (cp -a src/pages/docs/$v/images public/images/docs/$v)
    fi;
done