@extends('layouts.base-layout')
@push('styles')
<link href="{{ mix('css/stats.css') }}" rel="stylesheet">@endpush
@section('content')

<div class="stats card mt-1">
  <div class="lhs">
    <div class="p-1 text-center">
      <h1 id='stories'></h1>
      <p>Príbehov</p>
    </div>
    <div class="p-1 text-center">
      <h1 id='funders'></h1>
      <p>Darcov</p>
    </div>
    <div class="p-1 text-center">
      <h1 id='raised'></h1>
      <p>Vyzbieraných eur</p>
    </div>
    <div class="p-1 text-center">
      <h1 id='given'></h1>
      <p>Odovzdaných eur</p>
    </div>
  </div>
  <div class="rhs p-1">
    <h3>Vyzbierané peniaze</h3>
    <div id='plot'></div>
  </div>
</div>

<script src="https://d3js.org/d3.v7.min.js"></script>
<script>
  const stories = {!! json_encode($storyCount)!!};
  const given = {!! json_encode($given)!!};
  const raised = {!! json_encode($raised)!!};
  const funders = {!! json_encode($funders)!!};

  const periodicallyUpdate = (id, count) => {
    const selector = d3.select(`#${id}`)
    const step = count < 50 ? 1 : Math.floor(count / 100 * 2)
    const f = i => {
      selector.text(i)
      if (i === Math.floor(count)) return
      return requestAnimationFrame(() => f(i + step > count ? count : i + step))
    }
    requestAnimationFrame(() => f(0))
  }

  periodicallyUpdate('stories', stories)
  periodicallyUpdate('funders', funders)
  periodicallyUpdate('raised', raised)
  periodicallyUpdate('given', given)

  const monthsMap = {
    'január': 1,
    'február': 2,
    'marec': 3,
    'apríl': 4,
    'máj': 5,
    'jún': 6,
    'júl': 7,
    'august': 8,
    'september': 9,
    'október': 10,
    'november': 11,
    'december': 12,
  }
  const data = {!! json_encode($data)!!}.sort((a, b) => {
    const [month1, year1] = a.month.split(' ')
    const [month2, year2] = b.month.split(' ')
    return (+year1 + monthsMap[month1]) - (+year2 + monthsMap[month2])
  })
  const
    margin = { top: 30, right: 30, bottom: 100, left: 60 },
    width = document.getElementById('plot').clientWidth - margin.left - margin.right,
    height = 400 - margin.top - margin.bottom;

  const svg = d3.select("#plot")
    .append("svg")
    .attr('viewbox', `0 0 ${width + margin.left + margin.right} ${height + margin.top + margin.bottom}`)
    .attr('height', height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")")

  const x = d3.scaleBand()
    .range([0, width])
    .domain(data.map(({ month }) => month))
    .padding(0.2)
  svg.append("g")
    .attr("transform", "translate(0," + height + ")")
    .call(d3.axisBottom(x))
    .selectAll("text")
    .attr("transform", "translate(-10,0)rotate(-45)")
    .style("text-anchor", "end")
    .style('fill', '#686161')
    .style('font-size', '1rem')

  const y = d3.scaleLinear()
    .domain([0, d3.max(data.map(d => +d.total))])
    .range([height, 0]);
  svg.append("g")
    .call(d3.axisLeft(y))
    .selectAll("text")
    .style("text-anchor", "end")
    .style('fill', '#686161')
    .style('font-size', '1rem')

  svg.selectAll("mybar")
    .data(data)
    .enter()
    .append("rect")
    .attr("x", ({ month }) => x(month))
    .attr("width", x.bandwidth())
    .attr("fill", "#02cce4")
    .attr("height", d => height - y(0))
    .attr("y", d => y(0))

  svg.selectAll("rect")
    .transition()
    .duration(1000)
    .attr("y", ({ total }) => y(total))
    .attr("height", ({ total }) => height - y(total))
    .delay((d, i) => i * 200)
</script>
@endsection