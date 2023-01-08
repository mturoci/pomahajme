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

upload_files=$(echo $upload_files | sed 's/ /,/g')
curl -T "{$upload_files}" -u $FTP_USER:$FTP_PASS ftp://$FTP_HOST

delete_files=$(echo $delete_files | sed 's/ /,/g')
curl -Q "-DELE $delete_files" -u $FTP_USER:$FTP_PASS ftp://$FTP_HOST

