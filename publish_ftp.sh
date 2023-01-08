if [ -z "$FTP_HOST" ] || [ -z "$FTP_USER" ] || [ -z "$FTP_PASS" ]; then
    echo "FTP_HOST, FTP_USER and FTP_PASS env variables must be set."
    exit 1
fi

# Get last commit changed files.
files=$(git diff --name-only HEAD^ HEAD)

# Split files into delete and upload lists.
upload_files=""
delete_files=""
for file in $files; do
    if [ -f $file ]; then
        upload_files="$upload_files $file"
    else
        delete_files="$delete_files $file"
    fi
done

# If there are no files to upload, exit.
if [ -z "$upload_files" ]; then
    echo "No files to upload."
    exit 0
fi

for file in $upload_files; do
    curl -T $file -u $FTP_USER:$FTP_PASS "ftp://$FTP_HOST/$file" --ftp-create-dirs --no-epsv
done

# If there are no files to delete, exit.
if [ -z "$delete_files" ]; then
    echo "No files to delete."
    exit 0
fi

for file in $delete_files; do
    curl -Q "-DELE $file" -u $FTP_USER:$FTP_PASS "ftp://$FTP_HOST/$file" --no-epsv
done

# TODO: Publish frontend build with mix manifest.json file.
