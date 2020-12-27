#!/bin/bash

DOCS_VERSIONS=(
  3.0
  2.6
)

for v in "${DOCS_VERSIONS[@]}"; do
    if [ -d "resources/docs/$v" ]; then
        echo "Pulling latest documentation updates for $v..."
        (cd resources/docs/$v && git pull)
    else
        echo "Cloning $v..."
        git clone --single-branch --branch "$v" git@github.com:anodyne/docs.git "resources/docs/$v"
    fi;

    echo "Moving images for $v..."
    (rm -r public/docs/$v && cp -r resources/docs/$v/images public/docs/$v)
done