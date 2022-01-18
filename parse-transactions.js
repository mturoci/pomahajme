require('fs').writeFileSync('parsed.json', JSON.stringify(require('./transactions.json').map(t => ({
  date: t.column0?.value.replace('+0100', '') || null,
  value: t.column1?.value || 'NULL',
  account: t.column2?.value || 'NULL',
}))))