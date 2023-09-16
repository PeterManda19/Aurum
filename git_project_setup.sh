#!/bin/bash

# Check if Git user information is configured
if [ -z "$(git config user.name)" ] || [ -z "$(git config user.email)" ]; then
    echo "Git user information is missing. Configuring..."
    
    # Prompt the user for their Git username and email
    read -p "Enter your Git username: " git_username
    read -p "Enter your Git email: " git_email
    
    # Set Git username and email
    git config user.name "$git_username"
    git config user.email "$git_email"
    
    echo "Git user information configured:"
    echo "Username: $git_username"
    echo "Email: $git_email"
fi

# Initialise Git repository
git init

# Add files and commit them
git add .
git commit -m "Initial commit"

# Create remote repository on GitHub and add it as origin
# Replace <remote_repository_url> with your actual URL
git remote add origin https://<remote_repository_url>.git

# Push files to the remote repository
git push -u origin master

# Get GitHub username from the remote URL
github_username=$(git config --get remote.origin.url | sed -n 's/.*github.com[:/]\([^/]*\).*/\1/p')

# Get repository name from the remote URL
repository_name=$(basename -s .git $(git config --get remote.origin.url))

