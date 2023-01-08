# if [ -z "$FTP_HOST" ] || [ -z "$FTP_USER" ] || [ -z "$FTP_PASS" ]; then
#     echo "FTP_HOST, FTP_USER and FTP_PASS env variables must be set."
#     exit 1
# fi

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

upload_files=$(echo $upload_files | sed 's/ /,/g')
# curl -T "{$upload_files}" -u $FTP_USER:$FTP_PASS ftp://$FTP_HOST

# If there are no files to delete, exit.
if [ -z "$delete_files" ]; then
    echo "No files to delete."
    exit 0
fi

delete_files=$(echo $delete_files | sed 's/ /,/g')
# curl -Q "-DELE $delete_files" -u $FTP_USER:$FTP_PASS ftp://$FTP_HOST
