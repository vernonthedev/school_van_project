import 'package:flutter/material.dart';
import '../../backend/models/trip.dart';
import '../widgets/drawer.dart';
import '../widgets/filters/trip_filters.dart';
import '../widgets/lists/trip_list.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Dashboard'),
        actions: [
          IconButton(
            icon: const Icon(Icons.notification_important_rounded),
            onPressed: () {},
          ),
        ],
      ),
      drawer: const MyDrawer(),
      body: const TripManagementView(),
    );
  }
}

class TripManagementView extends StatefulWidget {
  const TripManagementView({super.key});

  @override
  State<TripManagementView> createState() => _TripManagementViewState();
}

class _TripManagementViewState extends State<TripManagementView> {
  DateTimeRange? selectedDateRange;
  String filterStatus = 'All';

  void updateFilters(DateTimeRange? dateRange, String status) {
    setState(() {
      selectedDateRange = dateRange;
      filterStatus = status;
    });
  }

  @override
  Widget build(BuildContext context) {
    // for now we are using temp data for trip listings.
    final trips = [
      TripAssigned(
        vanId: 1,
        vanStudentId: 101,
        sourceRoute: 'School',
        destinationRoute: 'Downtown',
        startTime: '08:00',
        endTime: '08:45',
        dateOfTrip: '2023-06-15',
        tripStatus: 'Completed',
      ),
      TripAssigned(
        vanId: 2,
        vanStudentId: 102,
        sourceRoute: 'Suburb',
        destinationRoute: 'School',
        startTime: '07:30',
        endTime: '08:15',
        dateOfTrip: '2023-06-16',
        tripStatus: 'In Progress',
      ),
      TripAssigned(
        vanId: 3,
        vanStudentId: 103,
        sourceRoute: 'School',
        destinationRoute: 'Residential Area',
        startTime: '15:00',
        endTime: '15:40',
        dateOfTrip: '2023-06-17',
        tripStatus: 'Scheduled',
      ),
      TripAssigned(
        vanId: 4,
        vanStudentId: 104,
        sourceRoute: 'School',
        destinationRoute: 'Mall',
        startTime: '16:00',
        endTime: '16:35',
        dateOfTrip: '2023-06-18',
        tripStatus: 'Cancelled',
      ),
    ];

    return Column(
      children: [
        TripFilters(
          selectedDateRange: selectedDateRange,
          filterStatus: filterStatus,
          onFiltersChanged: updateFilters,
        ),
        Expanded(
          child: TripList(
            selectedDateRange: selectedDateRange,
            filterStatus: filterStatus,
            trips: trips,
          ),
        ),
      ],
    );
  }
}
