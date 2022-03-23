#!/bin/bash

DOCS_VERSIONS=(
  3.0
  2.7
  2.6
  1.0
)

for v in "${DOCS_VERSIONS[@]}"; do
    path=${v/./_}
    if [ -d "resources/views/docs/$path" ]; then
        echo "Pulling latest documentation updates for $v..."
        (cd resources/views/docs/$path && git pull)
    else
        echo "Cloning $v..."
        git clone --single-branch --branch "$v" git@github.com:anodyne/docs.git "resources/views/docs/$path"
    fi;

    if [ -d "public/images/docs/$v" ]; then
        echo "Removing images for $v..."
        (rm -r public/images/docs/$v)
    fi;

    if [ -d "resources/views/docs/$path/images/docs/$v" ]; then
        echo "Moving images for $v..."
        (cp -r resources/views/docs/$path/images/docs/$v public/images/docs/$v)
    fi;
done