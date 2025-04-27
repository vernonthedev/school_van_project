import 'package:flutter/material.dart';
import 'package:van_operator_app/backend/functions/get_trips.dart';
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
  List<TripAssigned> trips = [];
  bool isLoading = false;
  String? errorMessage;

  @override
  void initState() {
    super.initState();
    _loadTrips();
  }

  Future<void> _loadTrips() async {
    setState(() {
      isLoading = true;
      errorMessage = null;
    });

    try {
      final loadedTrips = await GetTrips.loadTrips();

      setState(() {
        trips = loadedTrips;
      });
    } catch (e) {
      setState(() {
        errorMessage = e.toString();
      });
    } finally {
      setState(() {
        isLoading = false;
      });
    }
  }

  void updateFilters(DateTimeRange? dateRange, String status) {
    setState(() {
      selectedDateRange = dateRange;
      filterStatus = status;
    });
  }

  @override
  Widget build(BuildContext context) {
    // loading indicator while fetching data
    if (isLoading) {
      return const Center(child: CircularProgressIndicator());
    }

    // error message if something went wrong
    if (errorMessage != null) {
      return Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text(errorMessage!),
            ElevatedButton(onPressed: _loadTrips, child: const Text('Retry')),
          ],
        ),
      );
    }

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
